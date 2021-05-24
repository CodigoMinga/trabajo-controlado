<?php

use Illuminate\Database\Seeder;
use App\Client;
class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client->name = 'Sebastian';
        $client->rut = '17999418-6';
        $client->phone = '42923493';
        $client->email = 'sebastian.vera.moll@gmail.com';
        $client->representative = 'codigo minga';
        $client->statusclient = 1;
        $client->save();


        $client = new Client();
        $client->name = 'Codigo Minga';
        $client->rut = '17999456-6';
        $client->phone = '429254545';
        $client->email = 'codigo_minga@gmail.com';
        $client->representative = 'codigo minga';
        $client->statusclient = 1;
        $client->save();
    }
}
