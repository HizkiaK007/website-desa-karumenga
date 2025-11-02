<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_penduduk',
        'jumlah_laki',
        'jumlah_perempuan',
        'jumlah_keluarga',
        'jaga1',
        'jaga2',
        'jaga3',
        'jaga4',
    ];
}
