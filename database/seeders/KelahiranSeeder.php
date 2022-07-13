<?php

namespace Database\Seeders;

use App\Models\Kelahiran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelahiranSeeder extends Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 100; $i++) {
            Kelahiran::create([
                'name' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tanggal_lahir' => $faker->date('Y-m-d'),
                'tempat_lahir' => 'Kota Jantho',
                'nama_ayah' => $faker->name(),
                'nama_ibu' => $faker->name(),
                'keterangan' => 'Lahir dirumah sakit',
            ]);
        }
    }
}
