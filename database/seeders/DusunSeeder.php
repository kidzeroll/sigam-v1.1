<?php

namespace Database\Seeders;

use App\Models\Dusun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DusunSeeder extends Seeder
{
    public function run()
    {
        Dusun::create(['name' => 'BAHAGIA', 'rt' => '001', 'rw' => '001']);
        Dusun::create(['name' => 'SENTOSA', 'rt' => '002', 'rw' => '002']);
        Dusun::create(['name' => 'SEROJA', 'rt' => '003', 'rw' => '003']);
        Dusun::create(['name' => 'KEMUNING', 'rt' => '004', 'rw' => '004']);
        Dusun::create(['name' => 'SEULANGA', 'rt' => '005', 'rw' => '005']);
    }
}
