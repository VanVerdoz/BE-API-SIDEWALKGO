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
        Schema::table('laporan_keuangan', function (Blueprint $table) {
            $table->foreign(['cabang_id'], 'laporan_keuangan_cabang_id_fkey')->references(['id'])->on('cabang')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['dibuat_oleh'], 'laporan_keuangan_dibuat_oleh_fkey')->references(['id'])->on('pengguna')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporan_keuangan', function (Blueprint $table) {
            $table->dropForeign('laporan_keuangan_cabang_id_fkey');
            $table->dropForeign('laporan_keuangan_dibuat_oleh_fkey');
        });
    }
};
