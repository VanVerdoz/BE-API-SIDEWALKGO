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
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengguna_id')->nullable();
            $table->string('aksi', 50)->nullable();
            $table->string('tabel_terkait', 50)->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamp('waktu')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_aktivitas');
    }
};
