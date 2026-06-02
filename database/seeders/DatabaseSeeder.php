<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. BUAT ADMIN
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Lumina',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // 2. BUAT GURU
        User::updateOrCreate(
            ['email' => 'guru@gmail.com'],
            [
                'name' => 'Pak Guru AI',
                'password' => Hash::make('password123'),
                'role' => 'guru',
            ]
        );

        // 3. BUAT SISWA
        User::updateOrCreate(
            ['email' => 'siswa@gmail.com'],
            [
                'name' => 'Siswa Cyber',
                'password' => Hash::make('password123'),
                'role' => 'siswa',
            ]
        );
        
        echo "LOG: Tiga User Berhasil Dibuat!\n";
    }
}