<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\NguoiDungController;

use App\Http\Controllers\AuthController;
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     });

//     Route::get('/nguoi_dung', [NguoiDungController::class, 'index']);
// });

Route::middleware('admin')->group(function () {
    Route::resource('nguoi_dung', NguoiDungController::class);
});
