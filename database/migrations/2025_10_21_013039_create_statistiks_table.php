<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('statistiks', function (Blueprint $table) {
        $table->id();
        $table->integer('jumlah_penduduk')->default(0);
        $table->integer('jumlah_laki')->default(0);
        $table->integer('jumlah_perempuan')->default(0);
        $table->integer('jumlah_keluarga')->default(0);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistiks');
    }
};
