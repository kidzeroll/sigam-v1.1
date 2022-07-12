<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    public function run()
    {
        Pendidikan::create(['name' => 'TIDAK / BELUM SEKOLAH',]);
        Pendidikan::create(['name' => 'BELUM TAMAT SD/SEDERAJAT',]);
        Pendidikan::create(['name' => 'TAMAT SD / SEDERAJAT',]);
        Pendidikan::create(['name' => 'SLTP/SEDERAJAT',]);
        Pendidikan::create(['name' => 'SLTA / SEDERAJAT',]);
        Pendidikan::create(['name' => 'DIPLOMA I / II',]);
        Pendidikan::create(['name' => 'AKADEMI/ DIPLOMA III/S. MUDA',]);
        Pendidikan::create(['name' => 'DIPLOMA IV/ STRATA I',]);
        Pendidikan::create(['name' => 'STRATA II',]);
        Pendidikan::create(['name' => 'STRATA III']);
        Pendidikan::create(['name' => 'LAINNYA']);
    }
}
