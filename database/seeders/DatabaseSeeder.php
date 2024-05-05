<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\InfrastrukturModel;
use App\Models\KategoriModel;
use App\Models\LaporanModel;
use App\Models\UserModel;
use App\Models\LevelModel;
use App\Models\LokasiPelaporanModel;
use App\Models\StatusLaporanModel;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        LevelModel::create([
            'level_kode' => 'ADM',
            'level_nama' => 'Administrator',
        ]);
        LevelModel::create([
            'level_kode' => 'RW',
            'level_nama' => 'RW',
        ]);
        LevelModel::create([
            'level_kode' => 'WRG',
            'level_nama' => 'Warga',
        ]);


        UserModel::create([
            'level_id' => '1',
            'user_nik' => '1234623421234521',
            'user_password' => Hash::make('12345'),
            'user_nama' => 'Sofyan Abullah',
        ]);
        UserModel::create([
            'level_id' => '2',
            'user_nik' => '2234623421234522',
            'user_password' => Hash::make('12345'),
            'user_nama' => 'Alexander Abigail',
        ]);
        UserModel::create([
            'level_id' => '3',
            'user_nik' => '3234623421234523',
            'user_password' => Hash::make('12345'),
            'user_nama' => 'Anthono',
        ]);


        LokasiPelaporanModel::create([
            'lokasi_laporan_id' => 1,
            'lokasi_laporan' => 'Jl. MT HARYONO Gg.17',
        ]);
        LokasiPelaporanModel::create([
            'lokasi_laporan_id' => 2,
            'lokasi_laporan' => 'Jl. MT HARYONO Gg.19',
        ]);
        LokasiPelaporanModel::create([
            'lokasi_laporan_id' => 3,
            'lokasi_laporan' => 'Jl. MT HARYONO Gg.21',
        ]);
        LokasiPelaporanModel::create([
            'lokasi_laporan_id' => 4,
            'lokasi_laporan' => 'Jl. Dinoyo Permai',
        ]);
        LokasiPelaporanModel::create([
            'lokasi_laporan_id' => 5,
            'lokasi_laporan' => 'Jl. Dinoyo Permai Timur',
        ]);
        LokasiPelaporanModel::create([
            'lokasi_laporan_id' => 6,
            'lokasi_laporan' => 'Jl. Pasar Dinoyo',
        ]);

        InfrastrukturModel::create([
            'lokasi_laporan_id' => 1,
            'infrastruktur_kode' => 'JRNGLSTRK',
            'infrastruktur_nama' => 'Jaringan Listrik',
        ]);
        

        StatusLaporanModel::create([
            'status_kode' => 'STS01',
            'status_nama' => 'Status DiLaporkan',
        ]);


        LaporanModel::create([
            'user_id' => 3,
            'lokasi_laporan_id' => 1,
            'infrastruktur_id' => 1,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
        ]);
    }
}
