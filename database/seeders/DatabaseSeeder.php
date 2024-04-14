<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserModel;
use App\Models\LevelModel;
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
    }
}
