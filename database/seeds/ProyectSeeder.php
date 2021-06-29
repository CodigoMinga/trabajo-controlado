<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Proyect;

class ProyectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proyect = new Proyect;
        $proyect->name = 'name 1';
        $proyect->contact = 'contact 1';
        $proyect->entrytime = '2021-06-30';
        $proyect->departuretime = '2021-07-30';
        $proyect->user_id = '2';
        $proyect->client_id = '2';
        $proyect->save();

        $proyect = new Proyect;
        $proyect->name = 'name 2';
        $proyect->contact = 'contact 2';
        $proyect->entrytime = '2021-06-30';
        $proyect->departuretime = '2021-07-30';
        $proyect->user_id = '2';
        $proyect->client_id = '2';
        $proyect->save();

        $proyect = new Proyect;
        $proyect->name = 'name 3';
        $proyect->contact = 'contact 3';
        $proyect->entrytime = '2021-06-30';
        $proyect->departuretime = '2021-07-30';
        $proyect->user_id = '2';
        $proyect->client_id = '2';
        $proyect->save();

        $proyect = new Proyect;
        $proyect->name = 'name 4';
        $proyect->contact = 'contact 4';
        $proyect->entrytime = '2021-06-30';
        $proyect->departuretime = '2021-07-30';
        $proyect->user_id = '2';
        $proyect->client_id = '2';
        $proyect->save();

        $proyect = new Proyect;
        $proyect->name = 'name 5';
        $proyect->contact = 'contact 5';
        $proyect->entrytime = '2021-06-30';
        $proyect->departuretime = '2021-07-30';
        $proyect->user_id = '1';
        $proyect->client_id = '1';
        $proyect->save();

        $proyect = new Proyect;
        $proyect->name = 'name 6';
        $proyect->contact = 'contact 6';
        $proyect->entrytime = '2021-06-30';
        $proyect->departuretime = '2021-07-30';
        $proyect->user_id = '3';
        $proyect->client_id = '1';
        $proyect->save();
    }
}
