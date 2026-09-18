<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index']);

Route::get('/books/{id}', [BookController::class,'show']);

Route::get('/categories', [CategoriesController::class, 'index']);

Route::get('/members', [MemberController::class, 'index']);

Route::get('/members/{id}', [MemberController::class, 'show']);

Route::get('/dashboard', [DashboardController::class, 'index']);