<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->unique('pengguna_username_key');
            $table->string('password');
            $table->string('nama_lengkap', 100);
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
        DB::statement("alter table \"pengguna\" add column \"role\" role_enum not null");
        DB::statement("alter table \"pengguna\" add column \"status\" status_enum null default 'aktif'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
