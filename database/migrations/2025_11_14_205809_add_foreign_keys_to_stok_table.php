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
        Schema::table('stok', function (Blueprint $table) {
            $table->foreign(['cabang_id'], 'stok_cabang_id_fkey')->references(['id'])->on('cabang')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['produk_id'], 'stok_produk_id_fkey')->references(['id'])->on('produk')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stok', function (Blueprint $table) {
            $table->dropForeign('stok_cabang_id_fkey');
            $table->dropForeign('stok_produk_id_fkey');
        });
    }
};
