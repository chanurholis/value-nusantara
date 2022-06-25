<?php

namespace App\Http\Controllers\Officer;

use App\Auction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    public function index()
    {
        $auctions = Auction::all();

        return view('officers.auctions.index', [
            'auctions' => $auctions
        ]);
    }

    public function show($id)
    {
        $auctions = Auction::where('id', $id)->first();
        $status   = ['process', 'opened', 'closed'];

        return view('officers.auctions.show', [
            'model' => $auctions,
            'status' => $status
        ]);
    }

    public function update(Request $request, $id)
    {
        $auctions = Auction::where('id', $id)->first();

        $request['officer_id'] = Auth::user()->name;

        $auctions->update($request->all());

        return redirect(route('officer.auction-request'))->with('status', 'Status permintaan lelang berhasil diperbarui!');
    }
}
