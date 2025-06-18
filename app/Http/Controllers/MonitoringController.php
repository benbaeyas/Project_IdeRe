<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
{
    // Ambil semua proyek milik user yang sedang login
    $projects = Project::where('user_id', Auth::id())->get();

    return view('monitoring', compact('projects'));
}


public function show($id)
{
    $project = Project::with('category', 'user')->findOrFail($id);

    // Pastikan user hanya bisa lihat miliknya
    if ($project->user_id !== Auth::id()) {
        abort(403, 'Unauthorized');
    }

    return view('monitoring_detail', compact('project'));
}

}