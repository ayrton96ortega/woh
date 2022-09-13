<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = Role::create(['name'=>'Administrador']);
        $rol2 = Role::create(['name'=>'Jugador']);

        Permission::create(['name'=>'Admin'])->assignRole($rol1);
        Permission::create(['name'=>'Jugador'])->assignRole($rol2);
    }
}
