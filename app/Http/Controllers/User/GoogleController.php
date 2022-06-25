<?php

namespace App\Http\Controllers\User;

use App\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        if (Auth::check()) {
            return redirect('/user');
        }

        $oauthUser = Socialite::driver('google')->user();
        $user = User::where('google_id', $oauthUser->id)->first();

        if ($user) {
            Auth::loginUsingId($user->id);
            return redirect('/user');
        } else {
            $newUser = User::create([
                'id'          => Uuid::uuid4()->getHex(),
                'first_name'  => $oauthUser->user['given_name'],
                'last_name'   => $oauthUser->user['family_name'],
                'avatar'      => $oauthUser->avatar_original,
                'name'        => $oauthUser->name,
                'email'       => $oauthUser->email,
                'google_id'   => $oauthUser->id,
                'password'    => md5($oauthUser->token),
                'term_of_use' => 'on'
            ]);

            Auth::login($newUser);
            return redirect('/user');
        }
    }
}
