<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan semua admin
    public function index()
    {
        $admins = User::orderBy('created_at', 'desc')->get();
        return view('admin.user.index', compact('admins'));
    }

    // Form tambah admin
    public function create()
    {
        return view('admin.user.create');
    }

    // Simpan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.user.index')->with('success', 'Admin baru berhasil ditambahkan!');
    }

    // Hapus admin
    public function destroy(User $user)
    {
        // Cegah admin menghapus dirinya sendiri
        if (auth()->id() == $user->id) {
            return redirect()->route('admin.user.index')->with('error', 'Kamu tidak bisa menghapus akun kamu sendiri!');
        }

        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'Admin berhasil dihapus!');
    }
}
