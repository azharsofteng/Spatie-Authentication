<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authCheck(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users',
            'password' => 'required'
        ]);

        $cradentials = $request->only('username', 'password');

        if(Auth::attempt($cradentials)){
            return redirect()->intended('/');
        }
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
