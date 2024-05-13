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
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/hak_akses', function () {
     return view('hak_akses');
 });

Route::group(['prefix' => 'laporan', 'middleware' => ['auth', 'cekLevel:3']], function () {
     Route::get('/', [LaporanController::class, 'index']);
     Route::get('/tambah', [LaporanController::class, 'create']);
     Route::post('/', [LaporanController::class, 'store']);
     Route::get('/detail/{id}', [LaporanController::class, 'detail']);
     Route::get('/profile', [LaporanController::class, 'profile']);
     Route::post('/edit_profile', [LaporanController::class, 'editProfile']); 
     Route::get('/sandi', [LaporanController::class, 'sandi']);
     Route::post('/edit_sandi', [LaporanController::class, 'editSandi']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'cekLevel:1']], function () {
     Route::get('/', [LaporanController::class, 'indexAdmin']);
     Route::get('/rekap_laporan', [LaporanController::class, 'rekaplaporan']);
     Route::get('/detail/{id}', [LaporanController::class, 'detailAdmin']);

     Route::get('/infrastruktur', [InfrastrukturController::class, 'index']);
     Route::get('/infrastruktur/tambah', [InfrastrukturController::class, 'create']);
     Route::post('/infrastruktur', [InfrastrukturController::class, 'store']);
     Route::get('/infrastruktur/edit/{id}', [InfrastrukturController::class, 'edit']);
     Route::post('/infrastruktur/{id}', [InfrastrukturController::class, 'update']);
     Route::delete('/infrastruktur/hapus/{id}',  [InfrastrukturController::class, 'destroy']);

     Route::resource('level', LevelController::class)->names([
          'index' => 'admin.level.index',
          'create' => 'admin.level.create',
          'store' => 'admin.level.store',
          'edit' => 'admin.level.edit',
          'update' => 'admin.level.update',
          'destroy' => 'admin.level.destroy',
     ]);

     Route::resource('status_laporan', StatusLaporanController::class)->names([
          'index' => 'admin.status_laporan.index',
          'create' => 'admin.status_laporan.create',
          'store' => 'admin.status_laporan.store',
          'edit' => 'admin.status_laporan.edit',
          'update' => 'admin.status_laporan.update',
          'destroy' => 'admin.status_laporan.destroy',
          'ubahStatusLaporan' => 'admin.status_laporan.ubahStatusLaporan',
     ]);
});

Route::get('/registration', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/registration', [RegisterController::class, 'store']);


Route::resource('/user', UserController::class);

// Route::resource('/infrastruktur', InfrastrukturController::class);

Route::get('/tes', function () {
     return view('welcome');
 });
 
