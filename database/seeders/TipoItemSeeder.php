<?php

namespace Database\Seeders;

use App\Models\TipoItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoItem::create(['name'=>'Bota']);
        TipoItem::create(['name'=>'Armadura']);
        TipoItem::create(['name'=>'armas']);

    }
}
