<?php

namespace App\Http\Controllers;

use App\Officer;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

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
