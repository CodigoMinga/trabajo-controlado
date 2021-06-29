<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\User;
use App\Proyect;
use App\Role;
use App\Task;
use App\Item;
use App\Advance;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ProyectSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(AdvanceSeeder::class);
    }
}
