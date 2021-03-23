<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $auctions = Auction::all();

        return view('layouts.public-master', compact('auctions'));
    }
}
