<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\User;
use App\Role;
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
        
    }
}
