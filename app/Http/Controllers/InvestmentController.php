<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Monitoring;



class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'jumlah_investasi' => 'required|numeric|min:1',
        ]);

        // Ambil project untuk akses judul/deskripsi
        $project = Project::findOrFail($request->project_id);
        $project->increment('dana_terkumpul', $request->jumlah_investasi);
        $project->update();

        // Simpan data investasi
        Investment::create([
            'user_id' => Auth::id(),
            'project_id' => $project->id,
            'jumlah_investasi' => $request->jumlah_investasi,
            'tanggal_investasi' => now(),
            'status' => 'pending',
        ]);

        return redirect()->route('monitoring_investor')->with('success', 'Investasi berhasil dilakukan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Investment $investment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investment $investment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investment $investment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investment $investment)
    {
        //
    }
}
