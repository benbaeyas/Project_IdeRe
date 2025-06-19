<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Models\Project;


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
    $request->validate([
        'project_id' => 'required|exists:projects,id',
        'jumlah_investasi' => 'required|numeric|min:1000',
    ]);

    Investment::create([
        'user_id' => Auth::id(),
        'project_id' => $request->project_id,
        'jumlah_investasi' => $request->jumlah_investasi,
        'tanggal_investasi' => now(),
    ]);

    // Update dana terkumpul di proyek
    Project::where('id', $request->project_id)->increment('dana_terkumpul', $request->jumlah_investasi);

    return redirect()->route('statistik')->with('success', 'Pendanaan berhasil!');
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
        // Debugging (opsional, bisa dihapus setelah fix)
        // dd($investment);

        if (!$investment) {
            return redirect()->route('monitoring_investor')->with('error', 'Investasi tidak ditemukan.');
        }

        if ((int)$investment->user_id !== (int)Auth::id()) {
            return redirect()->route('monitoring_investor')->with('error', 'Anda tidak memiliki izin untuk menghapus investasi ini.');
        }

        try {
            $jumlahInvestasiDihapus = $investment->jumlah_investasi;
            $projectId = $investment->project_id;

            $investment->delete();

            Project::where('id', $projectId)->decrement('dana_terkumpul', $jumlahInvestasiDihapus);

            return redirect()->route('monitoring_investor')->with('success', 'Investasi berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('monitoring_investor')->with('error', 'Gagal menghapus investasi: ' . $e->getMessage());
        }
    }
}
