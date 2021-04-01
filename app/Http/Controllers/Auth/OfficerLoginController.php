<?php

namespace App\Http\Controllers\Auth;

use App\Officer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;

class OfficerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.officer-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $valid =  Auth::guard('officer')->attempt($request->only(['email', 'password']));

        if (!$valid) return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);

        $officer = Officer::where('email', $request->email)->get()->first();

        Auth::guard('officer')->setUser($officer);

        setcookie('API_TOKEN', $officer->api_token);

        return redirect(route('officer.dashboard'));
    }

    public function logout()
    {
        Auth::guard('officer')->logout();

        return redirect('/');
    }
}
