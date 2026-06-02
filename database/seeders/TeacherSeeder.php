<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    $teachers = [
        [
            'name' => 'Salis Kelmuri. S.Ag',
            'nip' => '197310212006041009',
            'email' => 'salis@lumina.com',
            'role' => 'guru',
            'role_type' => 'KEPALA SEKOLAH',
            'password' => bcrypt('password123'),
        ],
        [
            'name' => 'Halija Solissa. S.Pd',
            'nip' => '198202012011012006',
            'email' => 'halija@lumina.com',
            'role' => 'guru',
            'role_type' => 'BENDAHARA SEKOLAH',
            'password' => bcrypt('password123'),
        ],
        [
            'name' => 'Navratilova Kaya. S.Pd.MH',
            'nip' => '199008122015042001',
            'email' => 'navratilova@lumina.com',
            'role' => 'guru',
            'role_type' => 'WAKA KURIKULUM',
            'password' => bcrypt('password123'),
        ],
        // Lu bisa tambahin semua nama dari Doc lu di sini...
    ];

    foreach ($teachers as $teacher) {
        \App\Models\User::create($teacher);
    }
}
}
