<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
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

    public function newUser()
    {
        if(Auth::user()->cannot('User Management')) {
            abort(404);
        }
        $roles = Role::all();
        $users = User::all();
        return view('pages.newUser', compact('roles', 'users'));
    }

    public function store(Request $request)
    {
        if(Auth::user()->cannot('User Management')) {
            abort(404);
        }
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'username' => 'required|min:3',
            'password' => 'required|min:1'
        ]);

        $data = $request->except('password', 'image');
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        if($user) {
            $user->assignRole($request->role_id);
            Toastr::success('New user create Successful!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return back();
        }
        return back();
    }
}
