<?php


use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\InfrastrukturController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MatrikController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\StatusLaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\warga\TrenPelaporanController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/registration', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/registration', [RegisterController::class, 'store']);

// Hak Akses
Route::get('/hak_akses', function () {
     return view('hak_akses');
});

// Route Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'cekLevel:1']], function () {
     Route::get('/', [LaporanController::class, 'indexAdmin'])->name('admin');
     Route::get('/rekap_laporan', [LaporanController::class, 'rekaplaporan'])->name('admin.rekap_laporan');
     Route::post('/ubah_status/{id}', [LaporanController::class, 'editStatus'])->name('admin.ubah_status');
     Route::get('/detail/{id}', [LaporanController::class, 'detailAdmin'])->name('admin.detail');

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
     ]);

     // Profile
     Route::get('/profile', [ProfileController::class, 'profileAdmin'])->name('admin.profile');
     Route::post('/edit_profile', [ProfileController::class, 'editProfileAdmin'])->name('admin.edit_profile');
     Route::get('/sandi', [ProfileController::class, 'sandiAdmin'])->name('admin.sandi');
     Route::post('/edit_sandi', [ProfileController::class, 'editSandiAdmin'])->name('admin.edit_sandi');

     // Kriteria
     Route::resource('kriteria', KriteriaController::class)->except(['show'])->names([
          'index' => 'admin.kriteria.index',
          'create' => 'admin.kriteria.create',
          'store' => 'admin.kriteria.store',
          'edit' => 'admin.kriteria.edit',
          'update' => 'admin.kriteria.update',
          'destroy' => 'admin.kriteria.destroy',
     ]);
     Route::get('kriteria/keterangan_penilaian/{id}', [KriteriaController::class, 'keterangan_penilaian'])->name('admin.kriteria.keterangan_penilaian');
     Route::post('kriteria/simpan_keterangan_penilaian/{id}', [KriteriaController::class, 'simpan_keterangan_penilaian'])->name('admin.kriteria.simpan_keterangan_penilaian');

     // End Kriteria

     Route::get('/tren', [TrenPelaporanController::class, 'testes']);

     Route::post('/alternatif/updateNilai/{id}', [AlternatifController::class, 'updateNilai'])->name('admin.alternatif.updateNilai');


     Route::post('/admin/alternatif/updateAllStatus', [AlternatifController::class, 'updateAllStatus'])->name('admin.alternatif.updateAllStatus');




     Route::resource('alternatif', AlternatifController::class)->names([
          'index' => 'admin.alternatif.index',
     ]);

     Route::resource('matrik', MatrikController::class)->names([
          'index' => 'admin.matrik.index',
     ]);

     Route::get('/{status_id?}', [LaporanController::class, 'rekaplaporan'])->name('laporan.indexAdmin');
});

// Route RW
Route::group(['prefix' => 'rw', 'middleware' => ['auth', 'cekLevel:2']], function () {
     Route::get('/', [RWController::class, 'index']);
     Route::get('/hasil_laporan', [RWController::class, 'hasilLaporan'])->name('rw.hasil_laporan');

     Route::get('/cetak_pdf/{id}', [RWController::class, 'cetakPDF'])->name('rw.cetak_pdf');

     Route::get('/detail_hasil/{id}', [RWController::class, 'detailHasil'])->name('rw.detail_hasil');
     Route::post('/ubah_status/{id}', [RWController::class, 'editStatus'])->name('rw.ubah_status');

     Route::get('/detail_realisasi/{id}', [RWController::class, 'detailRealisasi'])->name('rw.detail_realisasi');
     Route::post('/edit_detailRealisasi/{id}', [RWController::class, 'editdetailRealisasi'])->name('rw.detailRealisasi');
     Route::put('/rw/edit-status/{id}', [RWController::class, 'editStatus'])->name('rw.edit_status');

     Route::get('/detail_selesai/{id}', [RWController::class, 'detailSelesai'])->name('rw.detail_selesai');
     Route::put('/rw/edit-statusSelesai/{id}', [RWController::class, 'editStatusSelesai'])->name('rw.edit_statusSelesai');

     // Profile
     Route::get('/profile', [ProfileController::class, 'profileRw'])->name('rw.profile');
     Route::post('/edit_profile', [ProfileController::class, 'editProfileRw'])->name('rw.edit_profile');
     Route::get('/sandi', [ProfileController::class, 'sandiRw'])->name('rw.sandi');
     Route::post('/edit_sandi', [ProfileController::class, 'editSandiRw'])->name('rw.edit_sandi');
     // End Profile
});

// Route Warga
Route::group(['prefix' => 'laporan', 'middleware' => ['auth', 'cekLevel:3']], function () {
     Route::get('/', [LaporanController::class, 'index'])->name('laporan.riwayat');
     Route::get('/dashboard', [LaporanController::class, 'dashboard'])->name('laporan.dashboard');
     Route::get('/tambah', [LaporanController::class, 'create'])->name('laporan.buat_laporan');
     Route::get('/tren', [TrenPelaporanController::class, 'testes']);
     Route::post('/', [LaporanController::class, 'store']);
     Route::get('/editLaporan/{id}', [LaporanController::class, 'editLaporan'])->name('laporan.editLaporan');
     Route::post('/update/{id}', [LaporanController::class, 'updateLaporan'])->name('laporan.updateLaporan');
     Route::get('/hapus/{id}', [LaporanController::class, 'hapusLaporan'])->name('laporan.hapusLaporan');
     Route::get('/detail/{id}', [LaporanController::class, 'detail'])->name('laporan.detailLaporan');

     // Profile
     Route::get('/profile', [ProfileController::class, 'profileWarga'])->name('laporan.profile');
     Route::post('/edit_profile', [ProfileController::class, 'editProfileWarga'])->name('laporan.edit_profile'); 
     Route::get('/sandi', [ProfileController::class, 'sandiWarga'])->name('laporan.sandi');
     Route::post('/edit_sandi', [ProfileController::class, 'editSandiWarga'])->name('laporan.edit_sandi');
     // End Profile

     Route::get('/{status_id?}', [LaporanController::class, 'index'])->name('laporan.index');
});
// End Route Warga

// Route::resource('/infrastruktur', InfrastrukturController::class);

Route::get('/tes', function () {
     return view('welcome');
 });
 
