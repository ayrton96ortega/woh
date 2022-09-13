<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create(['nombre'=>'Bota Leval 1', 'tipo_items_id'=> 1, 'defensa'=>0.8, 'ataque'=> 0  ]);
        Item::create(['nombre'=>'Armadura Leval 1', 'tipo_items_id'=> 2, 'defensa'=>3.5, 'ataque'=> 1]);
        Item::create(['nombre'=>'armas Leval 1', 'tipo_items_id'=> 3, 'defensa'=>1.5, 'ataque'=> 3]);
    }
}
