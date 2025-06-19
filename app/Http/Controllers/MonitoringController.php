<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Investment; // Tambahkan ini
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class MonitoringController extends Controller
{
    // Khusus Inovator
    public function indexInovator()
    {
        // Ambil semua proyek milik user yang sedang login
        $projects = Project::where('user_id', Auth::id())->get();

        return view('monitoring_inovator', compact('projects'));
    }

    // Khusus Investor
    public function indexInvestor()
    {
        $projects = Project::with('category')->get();
        $investments = Investment::with('project') // Ambil juga relasi project untuk detail
                                 ->where('user_id', Auth::id()) // Hanya investasi milik user yang login
                                 ->orderBy('tanggal_investasi', 'desc') // Urutkan berdasarkan tanggal terbaru
                                 ->get();

        return view('monitoring_investor', compact('projects', 'investments')); // Kirim kedua variabel
    }

    // Detail monitoring (bisa digunakan oleh keduanya)
    public function show($id)
    {
        $project = Project::with('category', 'user')->findOrFail($id);

        // Untuk investor, tidak perlu cek kepemilikan
        // Tapi untuk inovator, perlu dicek apakah dia pemiliknya
        if (Auth::user()->role === 'inovator' && $project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('monitoring_detail', compact('project'));
    }
}