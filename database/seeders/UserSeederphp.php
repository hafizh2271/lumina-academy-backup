<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Lumina',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // 2. Guru
        User::updateOrCreate(
            ['email' => 'guru@gmail.com'],
            [
                'name' => 'Pak Guru AI',
                'password' => Hash::make('password123'),
                'role' => 'guru',
            ]
        );

        // 3. Siswa
        User::updateOrCreate(
            ['email' => 'siswa@gmail.com'],
            [
                'name' => 'Siswa Cyber',
                'password' => Hash::make('password123'),
                'role' => 'siswa',
            ]
        );
    }
}