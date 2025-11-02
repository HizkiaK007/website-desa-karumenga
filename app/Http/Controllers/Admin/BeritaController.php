<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // ===============================
    // BAGIAN ADMIN (CRUD)
    // ===============================

    public function index()
    {
        $beritas = Berita::latest()->paginate(6);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar) {
                \Storage::disk('public')->delete($berita->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            \Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus.');
    }



    // ===============================
    // BAGIAN HALAMAN PUBLIK
    // ===============================

    /**
     * Menampilkan daftar berita publik
     */
    public function publikIndex()
    {
        $semuaBerita = Berita::latest()->paginate(5);
        return view('berita', compact('semuaBerita'));
    }

    /**
     * Menampilkan detail berita publik
     */
    public function publikShow($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita-detail', compact('berita'));
    }
}
