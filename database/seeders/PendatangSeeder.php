<?php

namespace Database\Seeders;

use App\Models\Pendatang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendatangSeeder extends Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 50; $i++) {
            Pendatang::create([
                'nik' => $faker->numerify('################'),
                'name' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tanggal_datang' => $faker->date('Y-m-d'),
                'alamat_asal' => 'Kota Jantho',
                'nomor_hp' => '082362568088',
                'keterangan' => 'untuk bekerja',
            ]);
        }
    }
}
