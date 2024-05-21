<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login(Request $request){
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            // Autentikasi berhasil
            return view('website/admin/dataMakananAdmin');
        } else {
            // Autentikasi gagal
            return back();
        }
    }
}


