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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cabang_id')->nullable();
            $table->integer('pengguna_id')->nullable();
            $table->string('nama_pengeluaran', 100);
            $table->decimal('nominal', 12);
            $table->date('tanggal')->nullable()->default(DB::raw('CURRENT_DATE'));
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
