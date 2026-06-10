<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //menampilkan halaman login
    public function showLogin(){
        return view('login');
    }

    //memproses data login
    public function login(Request $request){
        $akun = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        //cek ke database apakah akun cocok
        if(auth()->attempt($akun)) {
            $request->session()->regenerate();
            return redirect()->route('products.index');
        }

        //jika email/password salah kembalikan ke login dengan pesan error
        return back()->withErrors([
            'login_error' => 'email atau password salah'
        ]);
    }

    //proses logout
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}