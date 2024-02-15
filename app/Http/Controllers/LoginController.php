<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        // dd($request->all());
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        $data = [
            "username" => $request->username,
            "password" => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('dashboard.index');
            // dd("berhasil login");
        }else{
            return redirect()->route('loginAdmin')->with('failed', 'Username atau password salah');
        };
    }

    public function logout() {
        Auth::logout();
        // dd('success');
        return redirect()->route('login');
    }
}
