<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function indexInvestor()
    {
        // Logika untuk menampilkan halaman indeks investor
        return view('indeks_investor');
    }

    public function indexInovator()
    {
        // Logika untuk menampilkan halaman indeks inovator
        return view('indeks_inovator');
    }

    // Tambahkan metode lain yang spesifik untuk pengguna di sini jika perlu
    // misalnya, tampilkan profil, edit profil, dll.

    public function showProfile()
    {
        $user = Auth::user(); // Mengambil data user yang sedang login
        return view('profile', compact('user'));
    }

     public function showPinjaman()
    {
        return view('pinjaman');
    }

    public function showStatistik()
    {
        return view('statistik');
    }

    public function showMonitoring()
    {
        return view('monitoring');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'alamat' => 'required|string',
            'password' => 'nullable|min:6',
        ]);
    
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}