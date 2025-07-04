<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $categories = Categories::all(); // Ambil data kategori dari tabel categories
        return view('formajuan', compact('categories'));
    }

    /**
     * Store a newly created resource in storage (simpan pengajuan proyek).
     */
    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'deskripsi' => 'required|string',
            'foto_proyek' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'target_dana' => 'required|numeric|min:1',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'category_id' => 'required|exists:categories,id',
        ], [
            // Pesan kustom validasi (opsional)
            'judul.required' => 'Judul proyek tidak boleh kosong.',
            'deskripsi.required' => 'Deskripsi proyek tidak boleh kosong.',
            'target_dana.required' => 'Jumlah ajuan dana tidak boleh kosong.',
            'target_dana.numeric' => 'Jumlah ajuan dana harus berupa angka.',
            'tanggal_mulai.required' => 'Tanggal mulai tidak boleh kosong.',
            'tanggal_berakhir.required' => 'Tanggal selesai tidak boleh kosong.',
            'tanggal_berakhir.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'category_id.required' => 'Kategori proyek harus dipilih.',
            'foto_proyek.image' => 'File harus berupa gambar.',
            'foto_proyek.mimes' => 'Format gambar yang didukung adalah JPG, JPEG, PNG.',
            'foto_proyek.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        try {
            $fotoPath = null;
            if ($request->hasFile('foto_proyek')) {
                $fotoPath = $request->file('foto_proyek')->store('foto_proyek', 'public');
            }

            Project::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'foto_proyek' => $fotoPath,
                'target_dana' => $request->target_dana,
                'dana_terkumpul' => 0,
                'status' => 'open',
                'category_id' => $request->category_id,
                'user_id' => Auth::id(),
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_berakhir' => $request->tanggal_berakhir,
            ]);

            return redirect()->route('project.formajuan')->with('success_ajuan', 'Proyek berhasil diajukan!');

        } catch (\Exception $e) {
            \Log::error('Gagal menyimpan proyek: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->withErrors(['general' => 'Terjadi kesalahan saat menyimpan proyek. Silakan coba lagi nanti.']);
        }
    }
public function formajuan()
{
    $categories = Categories::all();
    return view('formajuan', compact('categories'));
}
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

    }
}
