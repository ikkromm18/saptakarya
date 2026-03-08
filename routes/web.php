<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TentangController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/portofolio', [PortfolioController::class, 'index'])->name('portofolio');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
