<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Izinkan field berikut untuk diisi massal
    protected $fillable = [
        'judul',
        'isi',
        'gambar',
    ];
}
