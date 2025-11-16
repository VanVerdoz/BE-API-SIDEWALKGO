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
        Schema::create('laporan_keuangan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cabang_id')->nullable();
            $table->date('periode_awal')->nullable();
            $table->date('periode_akhir')->nullable();
            $table->decimal('total_pendapatan', 12)->nullable()->default(0);
            $table->decimal('total_pengeluaran', 12)->nullable()->default(0);
            $table->decimal('laba_bersih', 12)->nullable()->storedAs('(total_pendapatan - total_pengeluaran)');
            $table->integer('dibuat_oleh')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_keuangan');
    }
};
