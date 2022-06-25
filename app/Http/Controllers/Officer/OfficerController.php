<?php

namespace App\Http\Controllers\Officer;

use File;
use App\User;
use App\Goods;
use App\Officer;
use App\Auction;
use App\AuctionHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function profile()
    {
        $goodies           = Goods::where('user_id', Auth::user()->id)->get();
        $auctions          = Auction::where('user_id', Auth::user()->id)->get();
        $auction_histories = AuctionHistory::where('user_id', Auth::user()->id)->get();

        return view('officers.profile', [
            'goodies'           => $goodies,
            'auctions'          => $auctions,
            'auction_histories' => $auction_histories
        ]);
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'avatar'       => 'mimes:jpg,png,jpeg|max:2048',
            'first_name'   => 'required|string',
            'last_name'    => 'required|string',
            'email'        => 'required|email',
            'phone_number' => 'required|numeric',
            'description'  => 'required'
        ]);

        $officer = Officer::find(Auth::user()->id);

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        if (!$request->avatar) {
            $data['avatar'] = $officer->avatar;
        } else {
            $data['avatar'] = $request->avatar;
            $data['avatar'] = time() . '_' . Auth::user()->name . '.' . $request->file('avatar')->extension();
            $request->file('avatar')->move(public_path('usersFile'), $data['avatar']);
        }

        File::delete('usersFile/' . $officer->avatar);
        $officer->update($data);

        return redirect('/user/profile/')->with('status', 'Profil berhasil diperbarui!');
    }
}
