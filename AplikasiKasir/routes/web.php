<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsenPetugasController;
use App\Http\Controllers\SettingsController;


Route::get('/', function () {
    return view('welcome');
});

// Autentikasi
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Halaman dashboard (hanya untuk user yang sudah login)
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/absen-petugas', [AbsenPetugasController::class, 'index'])->name('AbsenPetugas');
        Route::put('/absen-petugas/update/{id}', [AbsenPetugasController::class, 'update'])->name('absen.update');

 // Rute Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings/change-password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    Route::post('/settings/upload-profile', [SettingsController::class, 'uploadProfile'])->name('settings.uploadProfile');
});

    // CRUD untuk data
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('detail-penjualan', DetailPenjualanController::class);

// Halaman khusus admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});