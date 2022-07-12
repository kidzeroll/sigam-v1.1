<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{

    public function run()
    {
        Agama::create(['name' => 'ISLAM']);
        Agama::create(['name' => 'KRISTEN PROTESTAN']);
        Agama::create(['name' => 'KRISTEN KATOLIK']);
        Agama::create(['name' => 'HINDU']);
        Agama::create(['name' => 'BUDHA']);
        Agama::create(['name' => 'KONGHUCU']);
        Agama::create(['name' => 'LAINNYA']);
    }
}
