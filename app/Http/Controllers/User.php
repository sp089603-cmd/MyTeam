<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class User extends Controller
{
    // pesan selamat
    public function regist(Request $request): string
    {
        $dataSubmit = $request->validate([
            'nim' => ['required', 'min:10', 'max:11'],
            'nama' => ['required', 'min:3', 'max:40'],
            'pw' => ['required', 'min:10'],
        ]);

        $akun = new Account();
        $akun->nim = $request->input('nim');
        $akun->nama = $request->input('nama');
        $akun->password = $request->input('pw');
        $akun->save();

        return 'Selamat Bergabung Dengan Club!';
    }
}