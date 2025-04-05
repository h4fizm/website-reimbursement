<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view("login.login");
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'NIP' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('NIP', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }

        return redirect()->route('login')->with('error', 'NIP atau password yang Anda masukkan tidak sesuai.');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
