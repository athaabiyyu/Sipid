<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserModel;
use App\Models\LevelModel;
use App\Models\LaporanModel;
use App\Models\KriteriaModel;
use GuzzleHttp\Promise\Create;
use App\Models\AlternatifModel;
use Illuminate\Database\Seeder;
use App\Models\InfrastrukturModel;
use App\Models\StatusLaporanModel;
use Illuminate\Support\Facades\DB;
use App\Models\LokasiPelaporanModel;
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

        // Level
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
        // End Level


        // User
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
        // End User

        // Infrastruktur
        InfrastrukturModel::create([
            'infrastruktur_kode' => 'INFRA01',
            'infrastruktur_nama' => 'Jaringan Listrik',
        ]);
        InfrastrukturModel::create([
            'infrastruktur_kode' => 'INFRA02',
            'infrastruktur_nama' => 'Jalan',
        ]);
        InfrastrukturModel::create([
            'infrastruktur_kode' => 'INFRA03',
            'infrastruktur_nama' => 'TPS',
        ]);
        InfrastrukturModel::create([
            'infrastruktur_kode' => 'INFRA04',
            'infrastruktur_nama' => 'Saluran Air',
        ]);
        InfrastrukturModel::create([
            'infrastruktur_kode' => 'INFRA05',
            'infrastruktur_nama' => 'Lapangan',
        ]);
        InfrastrukturModel::create([
            'infrastruktur_kode' => 'INFRA06',
            'infrastruktur_nama' => 'Tempat Ibadah',
        ]);
        InfrastrukturModel::create([
            'infrastruktur_kode' => 'INFRA07',
            'infrastruktur_nama' => 'Posyandu',
        ]);
        // End Infrastruktur

        // Status Laporan
        StatusLaporanModel::create([
            'status_kode' => 'STS01',
            'status_nama' => 'Terkirim',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS02',
            'status_nama' => 'Dalam Verifikasi',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS03',
            'status_nama' => 'Dalam Proses',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS04',
            'status_nama' => 'Direalisasikan',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS05',
            'status_nama' => 'Selesai',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS06',
            'status_nama' => 'Ditolak',
        ]);


        // Laporan
        LaporanModel::create([
            'user_id' => 3,
            'infrastruktur_id' => 1,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
            'alamat_laporan' => 'jln. xxx'
        ]);
        // End Laporan

        // kriteria
        KriteriaModel::create([
            'kriteria_kode' => 'C1',
            'kriteria_nama' => 'Tingkat Keparahan',
            'kriteria_bobot' => 0.2,
            'kriteria_attribut' => 'Benefit',
        ]);
        KriteriaModel::create([
            'kriteria_kode' => 'C2',
            'kriteria_nama' => 'Biaya Perbaikan',
            'kriteria_bobot' => 0.15,
            'kriteria_attribut' => 'Cost',
        ]);
        KriteriaModel::create([
            'kriteria_kode' => 'C3',
            'kriteria_nama' => 'Banyak Laporan',
            'kriteria_bobot' => 0.25,
            'kriteria_attribut' => 'Benefit',
        ]);
        KriteriaModel::create([
            'kriteria_kode' => 'C4',
            'kriteria_nama' => 'Waktu Perbaikan',
            'kriteria_bobot' => 0.1,
            'kriteria_attribut' => 'Cost',
        ]);
        KriteriaModel::create([
            'kriteria_kode' => 'C5',
            'kriteria_nama' => 'Dampak Sosial',
            'kriteria_bobot' => 0.3,
            'kriteria_attribut' => 'Benefit',
        ]);
    }
}
