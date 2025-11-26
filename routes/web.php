<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\LopHocController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('admin')->group(function () {
    Route::resource('nguoi_dung', NguoiDungController::class);
});

Route::resource('lop_hoc', LopHocController::class)
    ->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::middleware('admin')->resource('lop_hoc', LopHocController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy']);
