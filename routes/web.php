<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('welcome'); // resources/views/welcome.blade.php
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('blogs', BlogController::class);
Route::resource('vehicles', VehicleController::class);