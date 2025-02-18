<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsenController;
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
        Route::get('/absen', [AbsenController::class, 'index'])->name('AbsenPetugas');
        Route::put('/absen/{id}', [AbsenController::class, 'update'])->name('absen.update');
        Route::delete('/absen/{id}', [AbsenController::class, 'destroy'])->name('absen.delete'); // Hapus absen (admin)

 // Rute Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings/change-password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    Route::post('/settings/upload-profile', [SettingsController::class, 'uploadProfile'])->name('settings.uploadProfile');
});

    // CRUD untuk data
    Route::resource('pelanggan', 'App\Http\Controllers\PelangganController');
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
    Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/pelanggan/{pelanggan}', [PelangganController::class, 'show'])->name('pelanggan.show');
    Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');

    //Route Produk
    Route::resource('produk', ProdukController::class);
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{produk}', [ProdukController::class, 'show'])->name('produk.show');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::get('/count-produk', [ProdukController::class, 'countProduk']);

    //penjualan
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('detail-penjualan', DetailPenjualanController::class);


Route::get('/absen-petugas', [AbsenPetugasController::class, 'index'])->name('AbsenPetugas');
Route::put('/absen-petugas/update/{id}', [AbsenPetugasController::class, 'update'])->name('absen.update');

// Halaman khusus admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});