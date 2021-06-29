<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\Advance;

class AdvanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advance = new Advance;
        $advance->name = 'name 1';
        $advance->people = 'people 1';
        $advance->workedh = 'workedh 1';
        $advance->coment = 'coment 1';
        $advance->percentage = '20';
        $advance->task_id = '1';
        $advance->save();

        $advance = new Advance;
        $advance->name = 'name 2';
        $advance->people = 'people 2';
        $advance->workedh = 'workedh 2';
        $advance->coment = 'coment 2';
        $advance->percentage = '20';
        $advance->task_id = '2';
        $advance->save();

        $advance = new Advance;
        $advance->name = 'name 3';
        $advance->people = 'people 3';
        $advance->workedh = 'workedh 3';
        $advance->coment = 'coment 3';
        $advance->percentage = '20';
        $advance->task_id = '3';
        $advance->save();

        $advance = new Advance;
        $advance->name = 'name 4';
        $advance->people = 'people 4';
        $advance->workedh = 'workedh 4';
        $advance->coment = 'coment 4';
        $advance->percentage = '20';
        $advance->task_id = '3';
        $advance->save();

        $advance = new Advance;
        $advance->name = 'name 5';
        $advance->people = 'people 5';
        $advance->workedh = 'workedh 5';
        $advance->coment = 'coment 5';
        $advance->percentage = '20';
        $advance->task_id = '4';
        $advance->save();

        $advance = new Advance;
        $advance->name = 'name 6';
        $advance->people = 'people 6';
        $advance->workedh = 'workedh 6';
        $advance->coment = 'coment 6';
        $advance->percentage = '20';
        $advance->task_id = '4';
        $advance->save();

        $advance = new Advance;
        $advance->name = 'name 7';
        $advance->people = 'people 7';
        $advance->workedh = 'workedh 7';
        $advance->coment = 'coment 7';
        $advance->percentage = '20';
        $advance->task_id = '5';
        $advance->save();
        
        $advance = new Advance;
        $advance->name = 'name 8';
        $advance->people = 'people 8';
        $advance->workedh = 'workedh 8';
        $advance->coment = 'coment 8';
        $advance->percentage = '20';
        $advance->task_id = '6';
        $advance->save();
    }
}
