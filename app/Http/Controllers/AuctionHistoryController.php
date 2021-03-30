<?php

namespace App\Http\Controllers;

use App\Auction;
use App\AuctionHistory;
use Illuminate\Http\Request;

class AuctionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AuctionHistory  $auctionHistory
     * @return \Illuminate\Http\Response
     */
    public function show(AuctionHistory $auctionHistory)
    {
        dd($auctionHistory);
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
        //
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
