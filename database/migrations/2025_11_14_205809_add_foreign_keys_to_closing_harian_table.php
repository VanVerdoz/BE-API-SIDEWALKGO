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
        Schema::table('closing_harian', function (Blueprint $table) {
            $table->foreign(['cabang_id'], 'fk_closing_cabang')->references(['id'])->on('cabang')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['pengguna_id'], 'fk_closing_pengguna')->references(['id'])->on('pengguna')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('closing_harian', function (Blueprint $table) {
            $table->dropForeign('fk_closing_cabang');
            $table->dropForeign('fk_closing_pengguna');
        });
    }
};
