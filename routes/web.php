<?php

use App\Http\Controllers\InfrastrukturController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StatusLaporanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/level', LevelController::class);
Route::resource('/user', UserController::class);
Route::resource('/infrastruktur', InfrastrukturController::class);
Route::resource('/status_laporan', StatusLaporanController::class);
Route::resource('/laporan', LaporanController::class);