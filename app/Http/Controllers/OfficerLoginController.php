<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Auth;
use App\Officer;

class OfficerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:officer')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.officer-login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        // Passwordnya pake bcrypt
        if (Auth::guard('officer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended('/admin');
        } else if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/user');
        }
    }

    public function logout()
    {
        Auth::guard('officer')->logout();

        return redirect('/');
    }
}
