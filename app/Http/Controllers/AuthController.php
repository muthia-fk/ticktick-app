<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        // Kalau user sudah login, langsung redirect ke /home
        if (Auth::check()) {
            return redirect('/home');
        }

        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Ambil input email & password
        $credentials = $request->only('email', 'password');

        // Coba login dengan Auth::attempt
        if (Auth::attempt($credentials)) {
        // Jika sukses, arahkan ke /home dengan pesan sukses
            return redirect()->intended('/home')->with('success', 'Login berhasil!');
        }


        // Jika gagal, kembali ke form login dengan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
