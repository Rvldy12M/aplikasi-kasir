<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;

Route::get('/', function () {
    return view('welcome');
});

// Autentikasi
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// CRUD untuk data
Route::middleware('auth')->group(function () {
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('detail-penjualan', DetailPenjualanController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});
