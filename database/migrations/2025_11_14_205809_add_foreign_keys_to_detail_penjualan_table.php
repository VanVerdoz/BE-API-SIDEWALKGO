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
        Schema::table('detail_penjualan', function (Blueprint $table) {
            $table->foreign(['penjualan_id'], 'detail_penjualan_penjualan_id_fkey')->references(['id'])->on('penjualan')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['produk_id'], 'detail_penjualan_produk_id_fkey')->references(['id'])->on('produk')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_penjualan', function (Blueprint $table) {
            $table->dropForeign('detail_penjualan_penjualan_id_fkey');
            $table->dropForeign('detail_penjualan_produk_id_fkey');
        });
    }
};
