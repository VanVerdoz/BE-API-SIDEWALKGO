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
        Schema::table('penjualan', function (Blueprint $table) {
            $table->foreign(['cabang_id'], 'penjualan_cabang_id_fkey')->references(['id'])->on('cabang')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['pengguna_id'], 'penjualan_pengguna_id_fkey')->references(['id'])->on('pengguna')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->dropForeign('penjualan_cabang_id_fkey');
            $table->dropForeign('penjualan_pengguna_id_fkey');
        });
    }
};
