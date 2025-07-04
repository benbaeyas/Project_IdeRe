<?php

use App\Http\Controllers\StatistikController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\InvestmentController;
use App\Http\Livewire\InvestmentChart;

// Route untuk halaman utama (login jika belum terotentikasi)
Route::get('/', function () {
    // Jika ingin langsung ke welcome page jika sudah login, tambahkan logika di sini
    if (Auth::check()) {
        if (Auth::user()->role == 'investor') {
            return redirect()->route('indeks_investor');
        } elseif (Auth::user()->role == 'inovator') {
            return redirect()->route('indeks_inovator');
        }
    }
    return view('login'); // Mengarahkan ke welcome.blade.php sebagai halaman utama
})->name('home'); // Mengubah nama route menjadi 'home' untuk konsistensi

// Route untuk halaman registrasi
Route::get('registrasi', [AuthController::class, 'tampilRegistrasi'])->name('registrasi.tampil');
Route::post('registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');

// Route untuk halaman login
Route::get('login', [AuthController::class, 'tampilLogin'])->name('login.tampil');
Route::post('login/submit', [AuthController::class, 'submitLogin'])->name('login.submit'); // Mengubah method menjadi POST dan path sama

// Route untuk logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk read pada profile
Route::get('/profile', [UserController::class, 'showProfile'])
       ->name('profile')
       ->middleware('auth');

Route::put('/profile/update', [UserController::class, 'updateProfile'])
       ->name('profile.update')
       ->middleware('auth');

// Route untuk statistik (HANYA SATU DEFINISI INI YANG BENAR)
Route::get('/statistik', [StatistikController::class, 'index'])
       ->name('statistik')
       ->middleware('auth'); // Tambahkan middleware auth di sini jika statistik hanya untuk user yang login

Route::middleware(['auth'])->group(function () {
    // Inovator
    Route::get('/monitoring-inovator', [MonitoringController::class, 'indexInovator'])->name('monitoring_inovator');

    // Investor
    Route::get('/monitoring-investor', [MonitoringController::class, 'indexInvestor'])->name('monitoring_investor');

    // Detail monitoring (bisa dipakai oleh keduanya)
    Route::get('/monitoring/{id}', [MonitoringController::class, 'show'])->name('monitoring.show');
});

Route::get('/pencarian', [MonitoringController::class, 'searchProjects'])->name('pencarian');

Route::get('/formajuan', [ProjectController::class, 'formajuan'])->name('project.formajuan');

Route::post('/investasi/store', [App\Http\Controllers\InvestmentController::class, 'store'])->name('investasi.store');

// Route yang memerlukan otentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/indeks_investor', function () {
        return view('indeks_investor');
    })->name('indeks_investor');

    Route::get('/indeks_inovator', function () {
        return view('indeks_inovator');
    })->name('indeks_inovator');

    Route::get('/pinjaman', function () {
        return view('pinjaman');
    })->name('pinjaman');

    // HAPUS ROUTE STATISTIK DARI SINI
    // Route::get('/statistik', function () {
    //     return view('statistik');
    // })->name('statistik');

    Route::get('/profil', function () {
        return view('profile');
    })->name('profile');
});
//08 mnambahkan berikut:
// Route::get('registrasi', [AuthController::class, 'tampilRegristasi'])->name('regristasi.tampil'); // Typo 'Regristasi'
Route::middleware(['auth'])->group(function () {
    Route::get('/pengajuan-dana', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/pengajuan-dana', [ProjectController::class, 'store'])->name('project.store');
});

Route::get('/formajuan', [ProjectController::class, 'formajuan'])->name('project.formajuan');