<?php

use App\Http\Controllers\InfrastrukturController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StatusLaporanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'laporan', 'middleware' => 'auth'], function () {
     Route::get('/', [LaporanController::class, 'index']);
     Route::get('/tambah', [LaporanController::class, 'create']);
     Route::post ('/', [LaporanController::class, 'store']);
});


Route::get('/registration', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/registration', [RegisterController::class, 'store']);

Route::resource('/level', LevelController::class);

Route::resource('/user', UserController::class);

Route::resource('/infrastruktur', InfrastrukturController::class);

Route::resource('/status_laporan', StatusLaporanController::class);

