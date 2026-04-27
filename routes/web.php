<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Halaman Login (Awal)
Route::get('/', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'loginSubmit'])->name('login.submit');

// Halaman Internal (Membawa parameter ?username=)
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
