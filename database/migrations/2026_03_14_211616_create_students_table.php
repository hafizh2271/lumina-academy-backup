<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function run()
{
    $faker = \Faker\Factory::create('id_ID');
    for($i = 1; $i <= 60; $i++) {
        \App\Models\Student::create([
            'name' => $faker->name,
            'nisn' => $faker->unique()->numerify('00#########'),
            'kelas' => 'SECTOR ' . $faker->randomElement(['X-1', 'X-2', 'XI-1', 'XII-3']),
            'photo' => null // Biar pake inisial dulu buat tes
        ]);
    }
}
};
