<?php

namespace App\Http\Controllers\User;

use App\AuctionHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuctionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctionHistories = AuctionHistory::where('user_id', Auth::user()->id)->get();

        return view('users.auction-history.index', [
            'model' => $auctionHistories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AuctionHistory $auctionHistory)
    {
        $request->validate([
            'bid' => 'required'
        ]);

        $auctionHistory = AuctionHistory::where('id', $request->id)->get();

        dd($auctionHistory);

        return redirect('/user/auctions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AuctionHistory  $auctionHistory
     * @return \Illuminate\Http\Response
     */
    public function show(AuctionHistory $auction_history)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AuctionHistory  $auctionHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(AuctionHistory $auctionHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AuctionHistory  $auctionHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuctionHistory $auctionHistory)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AuctionHistory  $auctionHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuctionHistory $auctionHistory)
    {
        //
    }
}
