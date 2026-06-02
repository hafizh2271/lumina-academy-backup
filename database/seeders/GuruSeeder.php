<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class GuruSeeder extends Seeder
{
    public function run()
    {
        $file = database_path('data/data_guru.csv');

        if (!File::exists($file)) {
            $this->command->error("File tidak ditemukan!");
            return;
        }

        $content = file_get_contents($file);
        
        // DETEKSI OTOMATIS: Cari apakah file pakai ";" atau ","
        $delimiter = str_contains($content, ';') ? ';' : ',';
        
        $handle = fopen($file, 'r');
        fgetcsv($handle, 1000, $delimiter); // Lewati header

        $count = 0;
        while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
            // Berdasarkan CSV lu: Kolom 0=No, 1=Nama, 2=NIP, 3=Jabatan
            // Kita proteksi: Cek dulu apakah kolom nama (index 1) ada isinya
            if (isset($data[1]) && !empty($data[1])) {
                User::create([
                    'name'     => $data[1],
                    'email'    => strtolower(str_replace(' ', '', $data[1])) . '@lumina.ac.id',
                    'password' => Hash::make('password123'),
                    'role'     => 'guru',
                    'nip'      => $data[2] ?? null,
                    'jabatan'  => $data[3] ?? 'Tenaga Pendidik',
                    'photo'    => 'default-guru.jpg',
                ]);
                $count++;
            }
        }

        fclose($handle);
        $this->command->info("Selesai! Berhasil mengimpor $count data guru.");
    }
}