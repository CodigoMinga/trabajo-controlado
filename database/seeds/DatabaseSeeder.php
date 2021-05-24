<?php

use Illuminate\Database\Seeder;
use App\Client;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        $this->call(ClientSeeder::class);
=======
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        
>>>>>>> Nicolas
    }
}
