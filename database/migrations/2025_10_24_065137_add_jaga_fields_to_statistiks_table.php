<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::table('statistiks', function (Blueprint $table) {
        $table->integer('jaga1')->default(0);
        $table->integer('jaga2')->default(0);
        $table->integer('jaga3')->default(0);
        $table->integer('jaga4')->default(0);
    });
}

public function down(): void
{
    Schema::table('statistiks', function (Blueprint $table) {
        $table->dropColumn(['jaga1', 'jaga2', 'jaga3', 'jaga4']);
    });
}

};
