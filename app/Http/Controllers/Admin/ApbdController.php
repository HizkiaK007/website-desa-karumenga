<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apbd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ApbdController extends Controller
{
    public function index()
    {
        $apbds = Apbd::orderByDesc('year')->get();
        return view('admin.apbd.index', compact('apbds'));
    }

    public function create()
    {
        return view('admin.apbd.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year' => 'required|integer|between:2000,2100|unique:apbds,year',
            'dana_desa' => 'nullable|numeric|min:0',
            'alokasi_dana' => 'nullable|numeric|min:0',
            'pendapatan_asli' => 'nullable|numeric|min:0',
            'bagi_hasil_pajak' => 'nullable|numeric|min:0', // ✅ kolom baru
            'belanja_pembangunan' => 'nullable|numeric|min:0',
            'belanja_pemerintahan' => 'nullable|numeric|min:0',
            'belanja_pemberdayaan' => 'nullable|numeric|min:0',
            'belanja_pembinaan' => 'nullable|numeric|min:0',
            'belanja_penanggulangan' => 'nullable|numeric|min:0', // ✅ kolom baru
            'pdf' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        // ✅ Hitung total pendapatan
        $totalPendapatan = ($data['dana_desa'] ?? 0)
            + ($data['alokasi_dana'] ?? 0)
            + ($data['pendapatan_asli'] ?? 0)
            + ($data['bagi_hasil_pajak'] ?? 0);

        // ✅ Hitung total belanja
        $totalBelanja = ($data['belanja_pembangunan'] ?? 0)
            + ($data['belanja_pemerintahan'] ?? 0)
            + ($data['belanja_pemberdayaan'] ?? 0)
            + ($data['belanja_pembinaan'] ?? 0)
            + ($data['belanja_penanggulangan'] ?? 0);

        // ✅ Data yang akan disimpan
        $payload = [
            'year' => $data['year'],
            'dana_desa' => $data['dana_desa'] ?? 0,
            'alokasi_dana' => $data['alokasi_dana'] ?? 0,
            'pendapatan_asli' => $data['pendapatan_asli'] ?? 0,
            'bagi_hasil_pajak' => $data['bagi_hasil_pajak'] ?? 0,
            'total_pendapatan' => $totalPendapatan,
            'belanja_pembangunan' => $data['belanja_pembangunan'] ?? 0,
            'belanja_pemerintahan' => $data['belanja_pemerintahan'] ?? 0,
            'belanja_pemberdayaan' => $data['belanja_pemberdayaan'] ?? 0,
            'belanja_pembinaan' => $data['belanja_pembinaan'] ?? 0,
            'belanja_penanggulangan' => $data['belanja_penanggulangan'] ?? 0,
            'total_belanja' => $totalBelanja,
        ];

        // ✅ Upload file PDF (jika ada)
        if ($request->hasFile('pdf')) {
            $path = $request->file('pdf')->store('apbd', 'public');
            $payload['pdf_path'] = $path;
        }

        Apbd::create($payload);

        return redirect()
            ->route('admin.apbd.index')
            ->with('success', 'Data APBD berhasil ditambahkan.');
    }

    public function edit(Apbd $apbd)
    {
        return view('admin.apbd.edit', compact('apbd'));
    }

    public function update(Request $request, Apbd $apbd)
    {
        $data = $request->validate([
            'year' => ['required', 'integer', 'between:2000,2100', Rule::unique('apbds', 'year')->ignore($apbd->id)],
            'dana_desa' => 'nullable|numeric|min:0',
            'alokasi_dana' => 'nullable|numeric|min:0',
            'pendapatan_asli' => 'nullable|numeric|min:0',
            'bagi_hasil_pajak' => 'nullable|numeric|min:0',
            'belanja_pembangunan' => 'nullable|numeric|min:0',
            'belanja_pemerintahan' => 'nullable|numeric|min:0',
            'belanja_pemberdayaan' => 'nullable|numeric|min:0',
            'belanja_pembinaan' => 'nullable|numeric|min:0',
            'belanja_penanggulangan' => 'nullable|numeric|min:0',
            'pdf' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        // ✅ Hitung ulang total pendapatan & belanja
        $totalPendapatan = ($data['dana_desa'] ?? 0)
            + ($data['alokasi_dana'] ?? 0)
            + ($data['pendapatan_asli'] ?? 0)
            + ($data['bagi_hasil_pajak'] ?? 0);

        $totalBelanja = ($data['belanja_pembangunan'] ?? 0)
            + ($data['belanja_pemerintahan'] ?? 0)
            + ($data['belanja_pemberdayaan'] ?? 0)
            + ($data['belanja_pembinaan'] ?? 0)
            + ($data['belanja_penanggulangan'] ?? 0);

        // ✅ Update data APBD
        $apbd->update([
            'year' => $data['year'],
            'dana_desa' => $data['dana_desa'] ?? 0,
            'alokasi_dana' => $data['alokasi_dana'] ?? 0,
            'pendapatan_asli' => $data['pendapatan_asli'] ?? 0,
            'bagi_hasil_pajak' => $data['bagi_hasil_pajak'] ?? 0,
            'total_pendapatan' => $totalPendapatan,
            'belanja_pembangunan' => $data['belanja_pembangunan'] ?? 0,
            'belanja_pemerintahan' => $data['belanja_pemerintahan'] ?? 0,
            'belanja_pemberdayaan' => $data['belanja_pemberdayaan'] ?? 0,
            'belanja_pembinaan' => $data['belanja_pembinaan'] ?? 0,
            'belanja_penanggulangan' => $data['belanja_penanggulangan'] ?? 0,
            'total_belanja' => $totalBelanja,
        ]);

        // ✅ Ganti file PDF jika upload baru
        if ($request->hasFile('pdf')) {
            if ($apbd->pdf_path && Storage::disk('public')->exists($apbd->pdf_path)) {
                Storage::disk('public')->delete($apbd->pdf_path);
            }

            $path = $request->file('pdf')->store('apbd', 'public');
            $apbd->update(['pdf_path' => $path]);
        }

        return redirect()
            ->route('admin.apbd.index')
            ->with('success', 'Data APBD berhasil diperbarui.');
    }

    public function destroy(Apbd $apbd)
    {
        if ($apbd->pdf_path && Storage::disk('public')->exists($apbd->pdf_path)) {
            Storage::disk('public')->delete($apbd->pdf_path);
        }

        $apbd->delete();

        return back()->with('success', 'Data APBD berhasil dihapus.');
    }

    public function showByYear($year)
    {
        $apbd = Apbd::where('year', $year)->first();

        if (!$apbd) {
            abort(404, 'Data APBD untuk tahun ini tidak ditemukan.');
        }

        return view('apbd.show', compact('apbd', 'year'));
    }
}
