<?php

namespace App\Http\Controllers\User;

use PDF;
use App\Goods;
use App\Auction;
use Ramsey\Uuid\Uuid;
use App\Identity_card;
use App\AuctionHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auction::where('status', 'opened')->get();

        return view('users.auctions.index', compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $goodies = Goods::where('user_id', Auth::user()->id)->whereNotIn('id', Auction::get('goods_id'))->get();

        return view('users.auctions.create', [
            'goodies'  => $goodies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'goods_id'    => 'required|unique:auctions',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date'
        ]);

        if ($request->start_date > $request->end_date) {
            return redirect(route('user.auctions.create'))->with('error', 'Pastikan Anda tidak keliru mengenai tanggal!');
        }

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        $goodies = Goods::where('id', $data['goods_id'])->get();

        foreach ($goodies as $goods) {
            $initial_price = $goods->initial_price;
        }

        $data['final_price'] = str_replace("Rp. ", "", $initial_price);
        $data['user_id']     = Auth::user()->id;
        $data['status']      = 'process';

        Auction::create($data);

        return redirect(route('user.auctions.create'))->with('status', 'Permohonan Lelang berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        return view('users.auctions.show', [
            'model'  => $auction
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date',
        ]);

        if ($request->start_date > $request->end_date) {
            return redirect('/user/auctions/' . $auction->id)->with('error', 'Pastikan Anda tidak keliru mengenai tanggal!');
        }

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        $auction->update($data);

        return redirect('/user/auctions/' . $auction->id)->with('status', 'Lelang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        dd('hapus');
    }

    public function my_auction()
    {
        $auctions = Auction::where('user_id', Auth::user()->id)->paginate(10);

        return view('users.auctions.my-auction', compact('auctions'));
    }

    public function auction_detail($id)
    {
        // Mengambil data Lelang berdasarkan Lelang yang dipilih
        $auction = Auction::where('id', $id)->first();

        // Mengambil data Auction History berdasarkan barang yang dipilih dan id user yang sedang login
        $auction_history = AuctionHistory::where([
            ['user_id', '=', Auth::user()->id],
            ['goods_id', '=', $auction['goods_id']]
        ])->first();

        if ($auction_history) {
            return view('users.auctions.detail', ['model' => $auction]);
        }

        if ($auction->user_id == Auth::user()->id) {
            return redirect('user/auctions/' . $id);
        }

        return view('users.auctions.follow', [
            'model' => $auction
        ]);
    }

    public function auction_follow($id)
    {
        // Mengambil data Lelang berdasarkan Barang Lelang yang diikuti
        $auction       = Auction::where('id', $id)->first();
        // Mengambil data KTP berdasarkan id user yang login saat ini
        $identity_card = Identity_card::where('user_id', Auth::user()->id)->first();

        // Jika tidak ada data KTP user
        if (!$identity_card['user_id'] == Auth::user()->id) {
            // Kembalikan ke halaman detail Lelang dengan pesan
            return redirect('/user/auctions/' . $id . '/detail')->with('error', 'Untuk mengikuti lelang, pasti Anda melengkapi KTP terlebih dahulur!');
        }

        // Jika user belum mengikuti Lelang
        if (!AuctionHistory::where([['user_id', Auth::user()->id], ['auction_id', $id]])->first()) {
            // Menambahkan data pada table auction history
            $auctionFollow = [
                'id'         => Uuid::uuid4()->getHex(),
                'auction_id' => $auction->id,
                'goods_id'   => $auction->goods_id,
                'user_id'    => Auth::user()->id
            ];

            AuctionHistory::create($auctionFollow);
        }

        // Kembalikan ke tampilan detail dengan status
        return view('users.auctions.detail', ['model' => $auction])->with('status', 'Lelang berhasil diikuti!');
    }

    public function export_filter(Request $request)
    {
        $request->validate([
            'start_export' => 'required|date',
            'end_export'   => 'required|date'
        ]);

        $auctions = Auction::where('user_id', Auth::user()->id)->whereBetween('created_at', [$request->start_export, $request->end_export])->get();

        return $this->export($auctions);
    }

    public function export($auctions)
    {
        $pdf = PDF::loadview('users.auctions.export', compact('auctions'))->setPaper('A4', 'potrait');
        return $pdf->stream('Laporan-Lelang-Saya');
    }
}
