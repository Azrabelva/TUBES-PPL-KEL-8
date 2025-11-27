<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KosController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\AuthController;

// ==========================
// HALAMAN UTAMA KE KOS
// ==========================
Route::get('/', function () {
    return redirect()->route('kos.index');
})->name('home');

// ==========================
// LOGIN
// ==========================
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// ==========================
// REGISTER
// ==========================
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// ==========================
// LOGOUT
// ==========================
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================
// ADMIN DASHBOARD
// ==========================
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// ==========================
// USER (Diarahkan ke KOS INDEX)
// ==========================
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return redirect()->route('kos.index');
    })->name('user.dashboard');
});

// ==========================
// CRUD KOS & KAMAR
// ==========================
Route::resource('kos', KosController::class)->parameters([
    'kos' => 'ko'
]);

Route::resource('kamar', KamarController::class);
