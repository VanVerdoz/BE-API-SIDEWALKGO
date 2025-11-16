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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cabang_id')->nullable();
            $table->integer('pengguna_id')->nullable();
            $table->timestamp('tanggal')->nullable()->useCurrent();
            $table->decimal('total', 12);
            $table->string('metode_pembayaran', 50)->nullable();
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
