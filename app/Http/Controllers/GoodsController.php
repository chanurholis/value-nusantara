<?php

namespace App\Http\Controllers;

use App\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use PDF;

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

        return view('admin.goodies.index', compact('goodies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goodies.create');
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

        $data['initial_price'] = str_replace("Rp. ", "", $data['initial_price']);
        $data['photo']         = time() . '_' . Auth::user()->name . '.' . $request->file('photo')->extension();
        $data['user_id']       = Auth::user()->id;

        $request->file('photo')->move(public_path('goodsFile'), $data['photo']);

        Goods::create($data);

        return redirect(route('admin.goodies.create'))->with('status', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function show(Goods $goody)
    {
        return view('admin.goodies.show', [
            'model' => $goody
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function edit(Goods $goods)
    {
        //
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

        return redirect('/admin/goodies/' . $goody->id)->with('status', 'Barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $delete = Goods::where('id', $id)->first();

        // if ($delete == 1) {
        //     $success = true;
        //     $message = "Barang berhasil dihapus";
        //     File::delete('goodsFile/' . $delete->file('photo'));

        //     return response()->json([
        //         'success' => $success,
        //         'message' => $message,
        //     ]);
        // } else {
        //     $success = false;
        //     $message = "Barang tidak ditemukan";

        //     return response()->json([
        //         'success' => $success,
        //         'message' => $message,
        //     ]);
        // }

        // return 'Success';

        $delete = Goods::where('id', $id)->first();

        Goods::destroy($id);
        File::delete('goodsFile/' . $delete->photo);

        return redirect(route('admin.goodies'))->with('status', 'Barang berhasil dihapus!');
    }

    public function export()
    {
        $goodies = Goods::all();

        $pdf = PDF::loadview('admin.goodies.export', compact('goodies'))->setPaper('A4', 'potrait');
        return $pdf->stream('Laporan-Barang');
    }
}
