<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratSeeder extends Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 50; $i++) {
            Surat::create([
                'penduduk_id' => $i,
                'jenis_surat' => $faker->randomElement(['SKKM', 'SKBB', 'SKBM', 'SKP', 'SKU', 'SKD', 'SKK', 'SKJ/D', 'SKY/P', 'SKC']),
                'keperluan' => 'akan diisi keperluan surat',
                'no_hp' => '082362568088',
            ]);
        }
    }
}
