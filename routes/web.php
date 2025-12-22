<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\HomeController;
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
use App\Http\Controllers\KosController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\AuthController;

// ==========================
// HALAMAN UTAMA KE KOS
// ==========================
<<<<<<< HEAD
Route::get('/', function () {
    return redirect()->route('kos.index');
})->name('home');
=======
Route::get('/', [HomeController::class, 'index'])->name('home');
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3

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
<<<<<<< HEAD
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// ==========================
// ADMIN DASHBOARD
// ==========================
use App\Http\Controllers\Admin\AdminDashboardController;

Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::post('/dashboard/kos/store', [AdminDashboardController::class, 'storeKos'])
        ->name('admin.dashboard.kos.store');

    Route::post('/dashboard/kos/update/{kos}', [AdminDashboardController::class, 'updateKos'])
        ->name('admin.dashboard.kos.update');

    Route::delete('/dashboard/kos/delete/{kos}', [AdminDashboardController::class, 'deleteKos'])
        ->name('admin.dashboard.kos.delete');
=======
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================
// ADMIN DASHBOARD
// ==========================
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
>>>>>>> dbf5348516c77631b2691dbbf0fe565ac3f1d7b3
});

// ==========================
// HELP DESK (FIXED)
// ==========================
Route::get('/helpdesk', function () {
    return view('helpdesk');
})->name('helpdesk');

// ==========================
// USER
// ==========================
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return redirect()->route('kos.index');
    })->name('user.dashboard');
});

// ==========================
// CRUD KOS & KAMAR
// ==========================
Route::resource('kos', KosController::class);

Route::resource('kamar', KamarController::class);
