<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('apbds', function (Blueprint $table) {
            $table->decimal('bagi_hasil_pajak', 15, 2)->default(0)->after('pendapatan_asli');
            $table->decimal('belanja_penanggulangan', 15, 2)->default(0)->after('belanja_pemberdayaan');
        });
    }

    public function down(): void
    {
        Schema::table('apbds', function (Blueprint $table) {
            $table->dropColumn(['bagi_hasil_pajak', 'belanja_penanggulangan']);
        });
    }
};
