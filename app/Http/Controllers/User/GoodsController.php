<?php

namespace App\Http\Controllers\User;

use PDF;
use File;
use App\Goods;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goodies = Goods::where('user_id', Auth::user()->id)->get();

        return view('users.goodies.index', compact('goodies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::where('city_id', '3213')->pluck('name', 'id');

        return view('users.goodies.create', [
            'districts' => $districts
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
            'goods'         => 'required',
            'initial_price' => 'required',
            'description'   => 'required|min:55',
            'photo'         => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        $data['id']            = Uuid::uuid4()->getHex();
        $data['initial_price'] = str_replace("Rp. ", "", $data['initial_price']);
        $data['photo']         = time() . '_' . Auth::user()->name . '.' . $request->file('photo')->extension();
        $data['user_id']       = Auth::user()->id;

        $request->file('photo')->move(public_path('goodsFile'), $data['photo']);

        Goods::create($data);

        return redirect(route('user.goodies.create'))->with('status', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function show(Goods $goody)
    {
        return view('users.goodies.show', [
            'model' => $goody
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goods $goody)
    {
        $request->validate([
            'photo'         => 'required',
            'goods'         => 'required',
            'initial_price' => 'required',
            'description'   => 'required'
        ]);

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        if (!$request->photo) {
            $data['photo'] = $goody->photo;
        } else {
            $data['photo'] = $request->photo;
            $data['photo'] = time() . '_' . Auth::user()->name . '.' . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('goodsFile'), $data['photo']);
        }

        $data['initial_price'] = str_replace("Rp. ", "", $data['initial_price']);
        $data['user_id']       = Auth::user()->id;

        $goody->update($data);

        return redirect('/user/goodies/' . $goody->id)->with('status', 'Barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Goods::where('id', $id)->first();

        Goods::destroy($id);
        File::delete('goodsFile/' . $delete->photo);

        return redirect(route('user.goodies'))->with('status', 'Barang berhasil dihapus!');
    }

    public function export_filter(Request $request)
    {
        $request->validate([
            'start_export' => 'required|date',
            'end_export'   => 'required|date'
        ]);

        $goodies = Goods::where('user_id', Auth::user()->id)->whereBetween('created_at', [$request->start_export, $request->end_export])->get();

        return $this->export($goodies);
    }

    public function export($goodies)
    {
        $pdf = PDF::loadview('users.goodies.export', compact('goodies'))->setPaper('A4', 'potrait');
        return $pdf->stream('Laporan-Barang');
    }

    public function village(Request $request)
    {
        $villages = Village::where('district_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($villages);
    }
}
