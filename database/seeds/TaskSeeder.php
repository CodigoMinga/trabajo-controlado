<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Task;
        $task->title = 'tarea 1';
        $task->description = 'descripcion 1';
        $task->percentage = '30';
        $task->item_id = '1';
        $task->save();
        
        $task = new Task;
        $task->title = 'tarea 2';
        $task->description = 'descripcion 2';
        $task->percentage = '30';
        $task->item_id = '1';
        $task->save();

        $task = new Task;
        $task->title = 'tarea 3';
        $task->description = 'descripcion 3';
        $task->percentage = '30';
        $task->item_id = '2';
        $task->save();

        $task = new Task;
        $task->title = 'tarea 4';
        $task->description = 'descripcion 4';
        $task->percentage = '30';
        $task->item_id = '2';
        $task->save();

        $task = new Task;
        $task->title = 'tarea 5';
        $task->description = 'descripcion 5';
        $task->percentage = '30';
        $task->item_id = '3';
        $task->save();

        $task = new Task;
        $task->title = 'tarea 6';
        $task->description = 'descripcion 6';
        $task->percentage = '30';
        $task->item_id = '3';
        $task->save();

    }
}
