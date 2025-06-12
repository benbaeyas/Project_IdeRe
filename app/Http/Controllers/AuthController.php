<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function tampilRegistrasi()
    {
        return view('registrasi');
    }

    public function submitRegistrasi(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'role' => 'required|in:investor,inovator',
        ]);

        $user = new User();
        $user->nama = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->alamat = $request->alamat;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('login.tampil')->with('sukses', 'Registrasi berhasil! Silakan login.');
    }

    public function tampilLogin()
    {
        return view('layout.login');
    }

    public function submitLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'investor') {
                return redirect()->route('indeks_investor');
            } elseif ($user->role == 'inovator') {
                return redirect()->route('indeks_inovator');
            }

            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'email' => ['Email atau password salah.'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.tampil')->with('sukses', 'Anda telah berhasil logout.');
    }
}