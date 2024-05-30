<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

   
class AuthController extends Controller
{
    private $users = [
        'admin' => 'password', // Username => Password
    ];

    public function showLoginForm()
    {
        return view('website.auth.loginAdmin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if (isset($this->users[$username]) && $this->users[$username] === $password) {
            session(['auth_user' => $username]);
            return redirect()->route('home');
        }

        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    public function home()
    {
        return view('home');
    }

    public function logout()
    {
        session()->forget('auth_user');
        return redirect()->route('login');
    }
}

   
   
   
    



