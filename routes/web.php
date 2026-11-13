<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

// Redirect halaman utama ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// Route Autentikasi (Hanya untuk tamu / yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Route Terlindungi (Wajib login menggunakan middleware auth)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Semua halaman sistem perpustakaan
    Route::resource('books', BookController::class);
    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::get('/members', [MemberController::class, 'index']);
    Route::get('/members/{id}', [MemberController::class, 'show']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Route khusus Admin (dilindungi Gate manage-users)
    Route::get('/users', [UserController::class, 'index'])
        ->middleware('can:manage-users')
        ->name('users.index');
});