<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User
        $this->call(SetupTableSeeder::class);
        $this->call(UsersTableSeeder::class);
      
    }
}
