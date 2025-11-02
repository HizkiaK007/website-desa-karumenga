<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApbdsTable extends Migration
{
    public function up()
    {
        Schema::create('apbds', function (Blueprint $table) {
            $table->id();
            $table->year('year')->index(); // tahun APBD
            // Pendapatan
            $table->unsignedBigInteger('dana_desa')->default(0);
            $table->unsignedBigInteger('alokasi_dana')->default(0);
            $table->unsignedBigInteger('pendapatan_asli')->default(0);
            $table->unsignedBigInteger('total_pendapatan')->default(0);
            // Belanja (kategori)
            $table->unsignedBigInteger('belanja_pembangunan')->default(0);
            $table->unsignedBigInteger('belanja_pemerintahan')->default(0);
            $table->unsignedBigInteger('belanja_pemberdayaan')->default(0);
            $table->unsignedBigInteger('belanja_pembinaan')->default(0);
            $table->unsignedBigInteger('total_belanja')->default(0);
            // File laporan
            $table->string('pdf_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apbds');
    }
}
