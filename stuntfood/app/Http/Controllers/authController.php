<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function index()
    {
        return view('website.auth.loginAdmin');
    }

    public function login(Request $request)
    {
        $validUsers = [
            'admin' => [
                'password' => 'admin',
                'Role' => 'Bidan'
            ]
        ];

        $username = $request->input('username');
        $password = $request->input('password');

        if (isset($validUsers[$username]) && isset($validUsers[$username]['password']) && $validUsers[$username]['password'] == $password) {
            session(['Role' => $validUsers[$username]['Role']]);
            return redirect('datamakananadmin');
        }

        return redirect('/login')->with('error', 'Username atau password yang anda masukan salah ...');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
