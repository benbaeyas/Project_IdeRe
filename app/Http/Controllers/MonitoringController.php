<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
    return view('monitoring_investor', compact('projects')); // ⬅ View ini menerima LIST
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