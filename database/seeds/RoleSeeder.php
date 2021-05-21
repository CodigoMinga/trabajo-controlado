<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'superadmin','description'=>'Usuario super administrador, puede ver todo (codigominga)']);
        Role::create(['name'=>'clientadmin','description'=>'El cliente del proyecto']);
        Role::create(['name'=>'normaluser','description'=>'Usuario Normal']);

    }
}
