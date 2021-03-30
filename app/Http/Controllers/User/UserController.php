<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Goods;
use App\Auction;
use App\AuctionHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $goodies           = Goods::where('user_id', Auth::user()->id)->get();
        $auctions          = Auction::where('user_id', Auth::user()->id)->get();
        $auction_histories = AuctionHistory::where('user_id', Auth::user()->id)->get();

        return view('users.index', [
            'goodies'           => $goodies,
            'auctions'          => $auctions,
            'auction_histories' => $auction_histories
        ]);
    }

    public function trash()
    {
        $trashed = Goods::onlyTrashed()->get();

        return view('users.trash', compact('trashed'));
    }

    public function restore($id)
    {
        Goods::onlyTrashed()->where('id', $id)->restore();

        return redirect(route('user.trashed'))->with('status', 'Data berhasil dipulihkan!');
    }

    public function profile()
    {
        $goodies  = Goods::where('user_id', Auth::user()->id)->get();
        $auctions = Auction::where('user_id', Auth::user()->id)->get();


        return view('users.profile', [
            'goodies' => $goodies,
            'auctions' => $auctions
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

        $user = User::find(Auth::user()->id);

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        if (!$request->avatar) {
            $data['avatar'] = $user->avatar;
        } else {
            $data['avatar'] = $request->avatar;
            $data['avatar'] = time() . '_' . Auth::user()->name . '.' . $request->file('avatar')->extension();
            $request->file('avatar')->move(public_path('usersFile'), $data['avatar']);
        }

        $user->update($data);

        return redirect('/user/profile/')->with('status', 'Profil berhasil diperbarui!');
    }
}
