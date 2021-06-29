<?php

use Illuminate\Database\Seeder;
use App\Proyect;
use App\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Item;
        $item->description = 'descripcion 1';
        $item->hhscheduled = '10';
        $item->proyect_id = '1';
        $item->save();

        $item = new Item;
        $item->description = 'descripcion 2';
        $item->hhscheduled = '10';
        $item->proyect_id = '1';
        $item->save();

        $item = new Item;
        $item->description = 'descripcion 3';
        $item->hhscheduled = '10';
        $item->proyect_id = '2';
        $item->save();

        $item = new Item;
        $item->description = 'descripcion 4';
        $item->hhscheduled = '10';
        $item->proyect_id = '2';
        $item->save();

    }
}
