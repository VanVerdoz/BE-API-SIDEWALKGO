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
        Schema::table('produksi', function (Blueprint $table) {
            $table->foreign(['cabang_id'], 'produksi_cabang_id_fkey')->references(['id'])->on('cabang')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['pengguna_id'], 'produksi_pengguna_id_fkey')->references(['id'])->on('pengguna')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['produk_id'], 'produksi_produk_id_fkey')->references(['id'])->on('produk')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produksi', function (Blueprint $table) {
            $table->dropForeign('produksi_cabang_id_fkey');
            $table->dropForeign('produksi_pengguna_id_fkey');
            $table->dropForeign('produksi_produk_id_fkey');
        });
    }
};
