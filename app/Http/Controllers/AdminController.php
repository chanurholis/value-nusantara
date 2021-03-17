<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Goods;
use App\Officer;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users    = User::all();
        $goodies  = Goods::all();
        $auctions = Auction::all();
        $officers = Officer::all();

        return view('admin.index', [
            'users'    => $users,
            'goodies'  => $goodies,
            'auctions' => $auctions,
            'officers' => $officers
        ]);
    }
}
