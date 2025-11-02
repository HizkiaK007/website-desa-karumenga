<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistik;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index()
    {
        $statistik = Statistik::first();
        return view('admin.statistik.index', compact('statistik'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'jumlah_penduduk' => 'required|integer|min:0',
            'jumlah_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
            'jumlah_keluarga' => 'required|integer|min:0',
            'jaga1' => 'required|integer|min:0',
            'jaga2' => 'required|integer|min:0',
            'jaga3' => 'required|integer|min:0',
            'jaga4' => 'required|integer|min:0',
        ]);

        $statistik = Statistik::first() ?? new Statistik();
        $statistik->fill($validated);
        $statistik->save();

        return back()->with('success', 'Statistik berhasil diperbarui!');
    }
}
