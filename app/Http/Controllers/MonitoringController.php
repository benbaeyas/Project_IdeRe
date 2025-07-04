<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Investment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Monitoring;
use Illuminate\View\View;

class MonitoringController extends Controller
{
    // Khusus Inovator
    public function indexInovator()
    {
        $projects = Project::where('user_id', Auth::id())->get();

        return view('monitoring_inovator', compact('projects'));
    }

    // Khusus Investor
    public function indexInvestor()
    {
        // Ambil semua investasi milik user ini
        $investments = Investment::where('user_id', auth()->id())
            ->with('project')
            ->latest()
            ->get();

        // Kelompokkan berdasarkan project_id
        $groupedInvestments = $investments->groupBy('project_id');

        // Ambil semua proyek untuk pencarian/filter
        $projects = Project::with(['investments' => function($q) {
            $q->where('user_id', auth()->id());
        }])->get();

        return view('monitoring_investor', compact('groupedInvestments', 'projects'));
    }

    // Detail monitoring (bisa digunakan oleh keduanya)
    public function show($id)
    {
        $project = Project::with('category', 'user')->findOrFail($id);

        if (Auth::check() && Auth::user()->role === 'inovator' && $project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('monitoring_detail', compact('project'));
    }

    // Cari Proyek (AJAX)
    public function searchProjects(Request $request)
    {
        // Query dasar proyek
        $query = Project::query()->with(['investments' => function($q) {
            if (Auth::check()) {
                $q->where('user_id', auth()->id());
            }
        }]);

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%$search%")
                  ->orWhere('deskripsi', 'like', "%$search%");
            });
        }

        // Filter status
        if ($request->filled('status') && is_array($request->status)) {
            $query->whereIn('status', $request->status);
        }

        $projects = $query->get();

        // Hanya return partial jika AJAX
        if ($request->ajax()) {
            return view('partials.projects_list', compact('projects'))->render();
        }

        // Untuk load awal halaman (jika bukan AJAX)
        return view('statistik', compact('projects'));
        
    }
}