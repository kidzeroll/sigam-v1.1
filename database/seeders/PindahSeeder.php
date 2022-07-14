<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use App\Models\Pindah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PindahSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {

            Pindah::create([
                'penduduk_id' => $i,
                'tujuan_pindah' => $faker->address(),
                'tanggal_pindah' => $faker->date('Y-m-d'),
                'keterangan' => 'Sudah bekeluarga disana',
            ]);
            $penduduk = Penduduk::findOrFail($i);
            $penduduk->status = 'pindah';
            $penduduk->save();
        }
    }
}
