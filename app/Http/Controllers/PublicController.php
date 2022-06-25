<?php

namespace App\Http\Controllers;

use App\Auction;
use Symfony\Component\HttpFoundation\Request;

class PublicController extends Controller
{
    function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('public.index');
    }

    public function about()
    {
        return view('public.about');
    }

    public function auction()
    {
        $auctions = Auction::where('status', 'opened')->get();

        return view('public.auction', compact('auctions'));
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function send(Request $request)
    {
        dd($request);
    }

    public function term_of_use()
    {
        return view('public.term-and-conditions');
    }

    public function privacy_policy()
    {
        return view('public.privacy-policy');
    }
}
