<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apbd;
use Illuminate\Support\Facades\Storage;

class ApbdController extends Controller
{
    /**
     * Halaman publik: daftar semua tahun APBDes
     */
    public function index()
    {
        $apbds = Apbd::orderBy('year', 'desc')->get();
        return view('apbd.index', compact('apbds'));
    }

    /**
     * Halaman publik: tampilkan APBDes berdasarkan tahun
     */
    public function showByYear($year)
    {
        $apbds = Apbd::where('year', $year)->get();

        if ($apbds->isEmpty()) {
            return view('apbd.show', [
                'year' => $year,
                'apbds' => $apbds,
                'message' => 'Belum ada data APBDes untuk tahun ' . $year,
            ]);
        }

        return view('apbd.show', compact('apbds', 'year'));
    }

    /**
     * Halaman admin: daftar data APBD
     */
    public function adminIndex()
    {
        $apbds = Apbd::orderBy('year', 'desc')->get();
        return view('admin.apbd.index', compact('apbds'));
    }

    /**
     * Form tambah APBD
     */
    public function create()
    {
        return view('admin.apbd.create');
    }

    /**
     * Simpan data APBD baru
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'year' => 'required|integer|between:2000,2100|unique:apbds,year',
            'dana_desa' => 'nullable|numeric|min:0',
            'alokasi_dana' => 'nullable|numeric|min:0',
            'pendapatan_asli' => 'nullable|numeric|min:0',
            'belanja_pembangunan' => 'nullable|numeric|min:0',
            'belanja_pemerintahan' => 'nullable|numeric|min:0',
            'belanja_pemberdayaan' => 'nullable|numeric|min:0',
            'belanja_pembinaan' => 'nullable|numeric|min:0',
            'pdf_path' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('pdf_path')) {
            $data['pdf_path'] = $request->file('pdf_path')->store('apbd', 'public');
        }

        Apbd::create($data);

        return redirect()->route('admin.apbd.index')->with('success', 'Data APBD berhasil ditambahkan.');
    }

    /**
     * Form edit APBD
     */
    public function edit(Apbd $apbd)
    {
        return view('admin.apbd.edit', compact('apbd'));
    }

    /**
     * Update data APBD
     */
    public function update(Request $request, Apbd $apbd)
    {
        $data = $request->validate([
            'year' => 'required|integer|between:2000,2100|unique:apbds,year,' . $apbd->id,
            'dana_desa' => 'nullable|numeric|min:0',
            'alokasi_dana' => 'nullable|numeric|min:0',
            'pendapatan_asli' => 'nullable|numeric|min:0',
            'belanja_pembangunan' => 'nullable|numeric|min:0',
            'belanja_pemerintahan' => 'nullable|numeric|min:0',
            'belanja_pemberdayaan' => 'nullable|numeric|min:0',
            'belanja_pembinaan' => 'nullable|numeric|min:0',
            'pdf_path' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('pdf_path')) {
            if ($apbd->pdf_path) {
                Storage::disk('public')->delete($apbd->pdf_path);
            }
            $data['pdf_path'] = $request->file('pdf_path')->store('apbd', 'public');
        }

        $apbd->update($data);

        return redirect()->route('admin.apbd.index')->with('success', 'Data APBD berhasil diperbarui.');
    }

    /**
     * Hapus data APBD
     */
    public function destroy(Apbd $apbd)
    {
        if ($apbd->pdf_path) {
            Storage::disk('public')->delete($apbd->pdf_path);
        }

        $apbd->delete();

        return redirect()->route('admin.apbd.index')->with('success', 'Data APBD berhasil dihapus.');
    }
}
