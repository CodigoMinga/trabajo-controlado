<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles  = Role::where('name', 'superadmin')->first();
        
        $codigominga    = Client::where('name','CodigoMinga Bar')->first();

        $user = new User;
        $user->name = 'Osvaldo';
        $user->email = 'osvaldo.alvarado.dev@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $user->roles()->attach($roles);
        $user->companies()->attach($codigominga);

        $user = new User;
        $user->name = 'Nikotine';
        $user->email = 'Nikotine991@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($roles);
        $user->companies()->attach($codigominga);

        $user = new User;
        $user->name = 'programador';
        $user->email = 'programador@microbesolutions.cl';
        $user->password = bcrypt('000000');
        $user->save();
        $user->roles()->attach($roles);
        $user->companies()->attach($codigominga);

        $user = new User;
        $user->name = 'Sebastian';
        $user->email = 'sebastian.vera.moll@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($roles);
        $user->companies()->attach($codigominga);

        $user = new User;
        $user->name = 'Suki';
        $user->email = 'perronegro.cl@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($roles);
        $user->companies()->attach($codigominga);
    }
}
