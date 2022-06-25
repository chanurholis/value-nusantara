<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auction::where('user_id', Auth::user()->id)->get();

        return view('admin.auctions.index', compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $goodies = Goods::where('user_id', Auth::user()->id)->get();
        $goodies = Goods::whereNotIn('id', Auction::get('goods_id'))->get();

        return view('admin.auctions.create', [
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
            'goods_id'    => 'required|numeric|unique:auctions',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
            'user_id'     => 'numneric',
            'officer_id'  => 'numeric'
        ]);

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
        $data['officer_id']  = 1;
        $data['status']      = 'closed';

        Auction::create($data);

        return redirect(route('admin.auctions.create'))->with('status', 'Permohonan Lelang berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        $status = ['opened', 'closed'];

        return view('admin.auctions.show', [
            'model'  => $auction,
            'status' => $status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        dd($auction);
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
            'status'     => 'required'
        ]);

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        $auction->update($data);

        redirect('/admin/auction/' . $auction->id)->with('status', 'Lelang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        //
    }

    public function export()
    {
        $auctions = Auction::all();

        $pdf = PDF::loadview('admin.auctions.export', compact('auctions'))->setPaper('A4', 'potrait');
        return $pdf->stream('Laporan-Lelang');
    }
}
