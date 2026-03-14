<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/portofolio', [PortfolioController::class, 'index'])->name('portofolio');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('admin/users', \App\Http\Controllers\Admin\UserController::class)
        ->names('admin.users');

    Route::resource('admin/orders', \App\Http\Controllers\Admin\OrderController::class)
        ->names('admin.orders')
        ->only(['index', 'show', 'update']);

    Route::resource('admin/portfolios', \App\Http\Controllers\Admin\PortfolioController::class)
        ->names('admin.portfolios');

    Route::resource('admin/produks', \App\Http\Controllers\Admin\ProdukController::class)
        ->names('admin.produks');

    // Testimoni management
    Route::get('admin/testimonis', [\App\Http\Controllers\Admin\TestimoniAdminController::class, 'index'])->name('admin.testimonis.index');
    Route::patch('admin/testimonis/{testimoni}/status', [\App\Http\Controllers\Admin\TestimoniAdminController::class, 'updateStatus'])->name('admin.testimonis.status');
    Route::delete('admin/testimonis/{testimoni}', [\App\Http\Controllers\Admin\TestimoniAdminController::class, 'destroy'])->name('admin.testimonis.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

use App\Http\Controllers\OrderController;

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // Pesanan User
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/payment', [OrderController::class, 'uploadPayment'])->name('orders.payment');

    // Testimoni User
    Route::post('/testimoni', [\App\Http\Controllers\TestimoniController::class, 'store'])->name('testimoni.store');
});
