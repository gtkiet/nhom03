<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('nguoi_dung', NguoiDungController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('user', UserController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('lop_hoc', LopHocController::class)->except(['index', 'show']);
});

Route::resource('lop_hoc', LopHocController::class)->only(['index', 'show']);

require __DIR__.'/auth.php';
