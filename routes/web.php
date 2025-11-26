<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\NguoiDungController;
Route::resource('nguoi_dung', NguoiDungController::class);
