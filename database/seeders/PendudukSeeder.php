<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendudukSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 1000; $i++) {
            Penduduk::create([
                'agama_id' => '1',
                'pendidikan_id' => '1',
                'pekerjaan_id' => '1',
                'status_perkawinan' => $faker->randomElement(['BELUM KAWIN', 'KAWIN', 'CERAI HIDUP', 'CERAI MATI']),
                'hubungan' => $faker->randomElement(['KEPALA KELUARGA', 'SUAMI', 'ISTRI', 'ANAK', 'MENANTU', 'MERTUA', 'CUCU']),
                'dusun_id' => '1',
                'no_kk' => $faker->numerify('################'),
                'nik' => $faker->numerify('################'),
                'name' => $faker->name(),
                'alamat' => $faker->address(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tanggal_lahir' => $faker->date('Y-m-d'),
                'tempat_lahir' => 'Kota Jantho',
                'kewarganegaraan' => $faker->randomElement(['WNI', 'WNA', 'GANDA']),
                'no_pasport' => '-',
                'no_kitas_kitap' => '-',
                'golongan_darah' => $faker->randomElement(['-', 'O+', 'O-', 'AB', 'A+', 'A-']),
                'penghasilan' => '-',
                'nama_ayah' => $faker->name(),
                'nama_ibu' => $faker->name(),
                'status' => $faker->randomElement(['ada', 'meninggal']),
            ]);
        }
    }
}
