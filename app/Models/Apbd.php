<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Apbd extends Model
{
    protected $fillable = [
        'year',
        'dana_desa',
        'alokasi_dana',
        'pendapatan_asli',
        'bagi_hasil_pajak', // ✅ tambahkan ini
        'total_pendapatan',
        'belanja_pembangunan',
        'belanja_pemerintahan',
        'belanja_pemberdayaan',
        'belanja_pembinaan',
        'belanja_penanggulangan', // ✅ tambahkan ini
        'total_belanja',
        'pdf_path',
    ];

    // helper untuk url file
    public function getPdfUrlAttribute()
    {
        return $this->pdf_path ? Storage::disk('public')->url($this->pdf_path) : null;
    }
}
