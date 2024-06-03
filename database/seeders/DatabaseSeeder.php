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
use App\Models\PenilaianKriteriaModel;
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
            'username' => 'admin',
            'user_password' => Hash::make('12345'),
            'user_nama' => 'Sofyan Abullah',
        ]);
        UserModel::create([
            'level_id' => '2',
            'username' => 'rw',
            'user_password' => Hash::make('12345'),
            'user_nama' => 'Alexander Abigail',
        ]);
        UserModel::create([
            'level_id' => '3',
            'username' => 'warga',
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
            'infrastruktur_nama' => 'Pos Ronda',
        ]);
        InfrastrukturModel::create([
            'infrastruktur_kode' => 'INFRA08',
            'infrastruktur_nama' => 'Balai RW',
        ]);
        // End Infrastruktur

        // Status Laporan
        StatusLaporanModel::create([
            'status_kode' => 'STS01',
            'status_nama' => 'Terkirim',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS02',
            'status_nama' => 'Dilihat ADM',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS03',
            'status_nama' => 'Sedang Diverifikasi',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS04',
            'status_nama' => 'Diverifikasi',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS05',
            'status_nama' => 'Diproses',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS06',
            'status_nama' => 'Dikirim ke RW',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS07',
            'status_nama' => 'Dilihat RW',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS08',
            'status_nama' => 'Direalisasikan',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS09',
            'status_nama' => 'Selesai',
        ]);
        StatusLaporanModel::create([
            'status_kode' => 'STS010',
            'status_nama' => 'Ditolak',
        ]);


        // Laporan
        LaporanModel::create([
            'user_id' => 3,
            'infrastruktur_id' => 1,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
            'alamat_laporan' => 'jln. xxx1'
        ]);
        LaporanModel::create([
            'user_id' => 3,
            'infrastruktur_id' => 2,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
            'alamat_laporan' => 'jln. xx2'
        ]);
        LaporanModel::create([
            'user_id' => 3,
            'infrastruktur_id' => 3,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
            'alamat_laporan' => 'jln. xx3'
        ]);
        LaporanModel::create([
            'user_id' => 3,
            'infrastruktur_id' => 4,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
            'alamat_laporan' => 'jln. xx4'
        ]);
        LaporanModel::create([
            'user_id' => 3,
            'infrastruktur_id' => 5,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
            'alamat_laporan' => 'jln. xx5'
        ]);
        LaporanModel::create([
            'user_id' => 3,
            'infrastruktur_id' => 6,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
            'alamat_laporan' => 'jln. xx6'
        ]);
        LaporanModel::create([
            'user_id' => 3,
            'infrastruktur_id' => 7,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
            'alamat_laporan' => 'jln. xx7'
        ]);
        LaporanModel::create([
            'user_id' => 3,
            'infrastruktur_id' => 7,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
            'alamat_laporan' => 'jln. xx8'
        ]);
        LaporanModel::create([
            'user_id' => 3,
            'infrastruktur_id' => 6,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
            'alamat_laporan' => 'jln. xx9'
        ]);
        LaporanModel::create([
            'user_id' => 3,
            'infrastruktur_id' => 5,
            'status_id' => 1,
            'tgl_laporan' => '2024-01-01',
            'deskripsi_laporan' => 'lorem lorem',
            'alamat_laporan' => 'jln. xx10'
        ]);
        // End Laporan

        // kriteria
        KriteriaModel::create([
            'kriteria_kode' => 'C1',
            'kriteria_nama' => 'Tingkat Keparahan',
            'kriteria_bobot' => 0.2,
            'kriteria_attribut' => 'Benefit',
            'jumlah_deskripsi' => 5
        ]);
        KriteriaModel::create([
            'kriteria_kode' => 'C2',
            'kriteria_nama' => 'Biaya Perbaikan',
            'kriteria_bobot' => 0.15,
            'kriteria_attribut' => 'Cost',
            'jumlah_deskripsi' => 5
        ]);
        KriteriaModel::create([
            'kriteria_kode' => 'C3',
            'kriteria_nama' => 'Banyak Laporan',
            'kriteria_bobot' => 0.25,
            'kriteria_attribut' => 'Benefit',
            'jumlah_deskripsi' => 5
        ]);
        KriteriaModel::create([
            'kriteria_kode' => 'C4',
            'kriteria_nama' => 'Waktu Perbaikan',
            'kriteria_bobot' => 0.1,
            'kriteria_attribut' => 'Cost',
            'jumlah_deskripsi' => 5
        ]);
        KriteriaModel::create([
            'kriteria_kode' => 'C5',
            'kriteria_nama' => 'Dampak Sosial',
            'kriteria_bobot' => 0.3,
            'kriteria_attribut' => 'Benefit',
            'jumlah_deskripsi' => 5
        ]);
        // End Kriteria


        // Penilaian Kriteria
        // C1
        PenilaianKriteriaModel::create([
            'kriteria_id' => 1,
            'level_keparahan' => 'Rendah',
            'deskripsi_penilaian_kriteria' => 'Kerusakan minor yang tidak mempengaruhi fungsi utama infrastruktur. Perbaikan bisa ditunda. Contoh: retakan kecil pada permukaan jalan, cat mengelupas.',
            'skor_penilaian_kriteria' => 1,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 1,
            'level_keparahan' => 'Sedang',
            'deskripsi_penilaian_kriteria' => 'Kerusakan yang mulai mempengaruhi fungsi tetapi belum menyebabkan kegagalan total. Memerlukan perhatian dalam waktu dekat. Contoh: lubang sedang di jalan, kerusakan ringan pada struktur bangunan.',
            'skor_penilaian_kriteria' => 2,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 1,
            'level_keparahan' => 'Tinggi',
            'deskripsi_penilaian_kriteria' => 'Kerusakan signifikan yang mengurangi fungsi utama infrastruktur dan membutuhkan perbaikan segera. Contoh: lubang besar di jalan yang mengganggu lalu lintas, kerusakan parah pada struktur bangunan yang bisa membahayakan keselamatan.',
            'skor_penilaian_kriteria' => 3,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 1,
            'level_keparahan' => 'Sangat Tinggi',
            'deskripsi_penilaian_kriteria' => 'Kerusakan sangat parah yang menyebabkan kegagalan fungsi total atau mengancam keselamatan publik. Memerlukan tindakan darurat. Contoh: runtuhnya sebagian jalan atau jembatan, kerusakan struktural serius pada bangunan yang bisa menyebabkan runtuhnya bangunan.',
            'skor_penilaian_kriteria' => 4,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 1,
            'level_keparahan' => 'Kritis',
            'deskripsi_penilaian_kriteria' => 'Kerusakan yang menyebabkan keadaan darurat atau bencana, membutuhkan tindakan darurat segera untuk menghindari korban atau kerugian yang lebih besar. Contoh: jembatan yang runtuh, bangunan yang ambruk.',
            'skor_penilaian_kriteria' => 5,
        ]);
        // C2
        PenilaianKriteriaModel::create([
            'kriteria_id' => 2,
            'level_keparahan' => 'Lebih dari 5jt',
            'deskripsi_penilaian_kriteria' => 'Biaya perbaikan lebih dari 5 juta',
            'skor_penilaian_kriteria' => 1,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 2,
            'level_keparahan' => '4jt - 5jt',
            'deskripsi_penilaian_kriteria' => 'Biaya perbaikan lebih dari 4 juta, kurang dari 5 juta',
            'skor_penilaian_kriteria' => 2,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 2,
            'level_keparahan' => '3jt - 4jt',
            'deskripsi_penilaian_kriteria' => 'Biaya perbaikan lebih dari 3 juta, kurang dari 4 juta',
            'skor_penilaian_kriteria' => 3,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 2,
            'level_keparahan' => '2jt - 3jt',
            'deskripsi_penilaian_kriteria' => 'Biaya perbaikan lebih dari 2 juta, kurang dari 3 juta',
            'skor_penilaian_kriteria' => 4,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 2,
            'level_keparahan' => '1jt - 2jt',
            'deskripsi_penilaian_kriteria' => 'Biaya perbaikan lebih dari 1 juta, kurang dari 2 juta',
            'skor_penilaian_kriteria' => 4,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 2,
            'level_keparahan' => 'Kurang dari 1jt',
            'deskripsi_penilaian_kriteria' => 'Biaya perbaikan kurang dari 1 juta',
            'skor_penilaian_kriteria' => 5,
        ]);
        // C3
        PenilaianKriteriaModel::create([
            'kriteria_id' => 3,
            'level_keparahan' => 'Kurang dari 3 laporan',
            'deskripsi_penilaian_kriteria' => 'Kurang dari 3 laporan',
            'skor_penilaian_kriteria' => 1,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 3,
            'level_keparahan' => '4 - 6 laporan',
            'deskripsi_penilaian_kriteria' => '4 - 6 laporan',
            'skor_penilaian_kriteria' => 2,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 3,
            'level_keparahan' => '7 - 9 laporan',
            'deskripsi_penilaian_kriteria' => '7 - 9 laporan',
            'skor_penilaian_kriteria' => 3,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 3,
            'level_keparahan' => '10 - 12 Laporan',
            'deskripsi_penilaian_kriteria' => '10 - 12 laporan',
            'skor_penilaian_kriteria' => 4,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 3,
            'level_keparahan' => 'Lebih dari 13 laporan',
            'deskripsi_penilaian_kriteria' => 'Lebih dari 13 laporan',
            'skor_penilaian_kriteria' => 5,
        ]);
        // C4
        PenilaianKriteriaModel::create([
            'kriteria_id' => 4,
            'level_keparahan' => 'Durasi lebih dari 30 hari',
            'deskripsi_penilaian_kriteria' => 'Waktu perbaikan lebih dari 30 hari',
            'skor_penilaian_kriteria' => 1,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 4,
            'level_keparahan' => 'Durasi 21 hari - 30 hari',
            'deskripsi_penilaian_kriteria' => 'Waktu perbaikan 21 - 30 hari',
            'skor_penilaian_kriteria' => 2,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 4,
            'level_keparahan' => 'Durasi 11 hari - 20 hari',
            'deskripsi_penilaian_kriteria' => 'Waktu perbaikan 11 - 20 hari',
            'skor_penilaian_kriteria' => 3,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 4,
            'level_keparahan' => 'Durasi 6 hari - 10 hari',
            'deskripsi_penilaian_kriteria' => 'Waktu perbaikan 6 - 10 hari',
            'skor_penilaian_kriteria' => 4,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 4,
            'level_keparahan' => 'Durasi kurang dari 5 hari',
            'deskripsi_penilaian_kriteria' => 'Waktu perbaikan kurang dari 5 hari',
            'skor_penilaian_kriteria' => 5,
        ]);
        // C5
        PenilaianKriteriaModel::create([
            'kriteria_id' => 5,
            'level_keparahan' => 'Dampak Minimal',
            'deskripsi_penilaian_kriteria' => 'Dampak minimal pada masyarakat, tidak ada gangguan berarti',
            'skor_penilaian_kriteria' => 1,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 5,
            'level_keparahan' => 'Dampak Kecil',
            'deskripsi_penilaian_kriteria' => 'Dampak kecil pada masyarakat, gangguan ringan',
            'skor_penilaian_kriteria' => 2,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 5,
            'level_keparahan' => 'Dampak Sedang',
            'deskripsi_penilaian_kriteria' => 'Dampak sedang pada masyarakat, beberapa gangguan',
            'skor_penilaian_kriteria' => 3,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 5,
            'level_keparahan' => 'Dampak Besar',
            'deskripsi_penilaian_kriteria' => 'Dampak besar pada masyarakat, gangguan signifikan',
            'skor_penilaian_kriteria' => 4,
        ]);
        PenilaianKriteriaModel::create([
            'kriteria_id' => 5,
            'level_keparahan' => 'Dampak Sangat Besar',
            'deskripsi_penilaian_kriteria' => 'Dampak sangat besar pada masyarakat, gangguan sangat parah',
            'skor_penilaian_kriteria' => 5,
        ]);
        // End Penilaian Kriteria
    }
}
