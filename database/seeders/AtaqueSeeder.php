<?php

namespace Database\Seeders;

use App\Models\Ataque;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtaqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Ataque::create(['name'=>'distancia', 'valor'=>0.8]);
        Ataque::create(['name'=>'cuerpo', 'valor'=>1]);
        Ataque::create(['name'=>'ulti', 'valor'=>2]);
    }
}
