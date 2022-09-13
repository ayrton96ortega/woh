<?php

namespace Database\Seeders;

use App\Models\TipoJugador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoJugadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TipoJugador::create(['name'=>'Humano']);
        TipoJugador::create(['name'=>'Zombi']);
    }
}
