<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Statistik;
use App\Models\Apbd;
class PageController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::latest()->take(3)->get();
        $statistik = Statistik::first();
        return view('pages.home', compact('beritaTerbaru', 'statistik'));
    }

    public function profil()
    {
        return view('pages.profil');
    }

    public function struktur()
    {
        return view('pages.struktur');
    }

    public function berita()
    {
        $semuaBerita = Berita::latest()->paginate(6);
        return view('pages.berita', compact('semuaBerita'));
    }

    public function apbd()
    {
        $apbds = Apbd::orderByDesc('year')->get();

        $chartData = $apbds->map(function ($a) {
            return [
                'year' => $a->year,
                'pendapatan' => (int) ($a->total_pendapatan ?? 0),
                'belanja' => (int) ($a->total_belanja ?? 0),
            ];
        });

        return view('pages.apbd', compact('apbds', 'chartData'));
    }

    public function statistik()
    {
        $statistik = Statistik::latest()->first();
        return view('pages.statistik', compact('statistik'));
    }
}
