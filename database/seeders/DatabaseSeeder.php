<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            ProfilGampongSeeder::class,
            UserSeeder::class,
            AgamaSeeder::class,
            PendidikanSeeder::class,
            PekerjaanSeeder::class,
            DusunSeeder::class,
            PendudukSeeder::class,
            KelahiranSeeder::class,
            PendatangSeeder::class,
            PindahSeeder::class,
            KematianSeeder::class,
            PengaduanSeeder::class,
            SuratSeeder::class,
        ]);
    }
}
