<?php

namespace App\Http\Controllers\Admin;

use App\Auction;
use App\Goods;
use App\Http\Controllers\Controller;
use App\Officer;
use App\User;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index()
    {
        $users    = User::all();
        $officers = Officer::all();
        $goodies  = Goods::all();
        $auctions = Auction::all();

        return view('officers.index', [
            'users' => $users,
            'officers' => $officers,
            'goodies' => $goodies,
            'auctions' => $auctions
        ]);
    }
}
