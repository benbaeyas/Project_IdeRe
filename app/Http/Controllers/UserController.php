<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'current_password' => 'nullable|string',
            'password' => 'nullable|string|min:6|confirmed',
        ]);
    
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        
        $passwordChanged = false;

        // Logika untuk mengganti password
        if ($request->filled('current_password') || $request->filled('password') || $request->filled('password_confirmation')) {
            // Validasi bahwa semua field password diisi jika salah satu diisi
            if (!$request->filled('current_password')) {
                return redirect()->route('profile')->with('error_password', 'Password lama harus diisi untuk mengganti password.');
            }
            if (!$request->filled('password')) {
                return redirect()->route('profile')->with('error_password', 'Password baru tidak boleh kosong jika ingin mengganti password.');
            }
            if (!$request->filled('password_confirmation')) {
                return redirect()->route('profile')->with('error_password', 'Konfirmasi password baru tidak boleh kosong.');
            }

            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->route('profile')->with('error_password', 'Password lama tidak sesuai.');
            }

            // Validasi tambahan jika password baru sama dengan password lama (opsional)
            // if (Hash::check($request->password, $user->password)) {
            //     return redirect()->route('profile')->with('error_password', 'Password baru tidak boleh sama dengan password lama.');
            // }

            $user->password = Hash::make($request->password);
            $passwordChanged = true;
        }
    
        $user->save();
    
        if ($passwordChanged) {
            return redirect()->route('profile')->with('success_password', 'Password berhasil diperbarui!');
        } elseif ($request->hasAny(['nama', 'email', 'alamat']) && !$request->filled('current_password') && !$request->filled('password') && !$request->filled('password_confirmation')) {
            // Hanya update profil, bukan password
             return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
             
        } elseif (!$request->hasAny(['nama', 'email', 'alamat', 'current_password', 'password', 'password_confirmation'])) {
            // Tidak ada yang diubah
            return redirect()->route('profile')->with('info', 'Tidak ada perubahan yang disimpan.'); // Atau pesan lain yang sesuai

        } elseif (!$request->hasAny(['nama', 'email', 'alamat', 'current_password', 'password', 'password_difference'])) {
            // Tidak ada yang diubah
            return redirect()->route('profile')->with('info', 'Gagal, Password baru tidak sama.'); // Atau pesan lain yang sesuai
        }
        // Jika hanya field password yang diisi tapi tidak lengkap, error sudah ditangani di atas
        return redirect()->route('profile'); // Fallback jika tidak ada kondisi yang terpenuhi
    }
}