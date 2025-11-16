<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProdukController;


Route::post('/register', [AuthController::class, 'register']); // Daftar pengguna
Route::post('/login', [AuthController::class, 'login']);       // Login pengguna

// Semua route di bawah hanya bisa diakses setelah login
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']); // Logout
    Route::get('/profile', [AuthController::class, 'profile']); // Lihat data pengguna login
});

// Hanya owner dan admin
Route::middleware(['auth:sanctum', 'role:owner,admin'])->group(function () {
    Route::post('/pengguna', [PenggunaController::class, 'store']);     // Create
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update']); // Update
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy']); // Delete
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pengguna', [PenggunaController::class, 'index']);//get
});

// ========== Hanya login ==========
Route::middleware('auth:sanctum')->group(function () {

    // GET dapat diakses semua role
    Route::get('/produk', [ProdukController::class, 'index']);

    // CRUD hanya owner & kepala_gudang
    Route::middleware('role:owner,kepala_gudang')->group(function () {
        Route::post('/produk', [ProdukController::class, 'store']);
        Route::put('/produk/{id}', [ProdukController::class, 'update']);
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);
    });

});


