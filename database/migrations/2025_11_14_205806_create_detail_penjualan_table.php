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
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penjualan_id')->nullable();
            $table->integer('produk_id')->nullable();
            $table->integer('jumlah');
            $table->decimal('harga', 12);
            $table->decimal('subtotal', 12)->nullable()->storedAs('((jumlah)::numeric * harga)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan');
    }
};
