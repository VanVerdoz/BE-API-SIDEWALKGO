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
        Schema::table('pengeluaran', function (Blueprint $table) {
            $table->foreign(['cabang_id'], 'pengeluaran_cabang_id_fkey')->references(['id'])->on('cabang')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['pengguna_id'], 'pengeluaran_pengguna_id_fkey')->references(['id'])->on('pengguna')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengeluaran', function (Blueprint $table) {
            $table->dropForeign('pengeluaran_cabang_id_fkey');
            $table->dropForeign('pengeluaran_pengguna_id_fkey');
        });
    }
};
