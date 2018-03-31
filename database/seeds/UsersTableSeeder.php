<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
	    
        DB::table('users_type')->insert(
            [
                [ 'name'              => 'Admin'],
                [ 'name'              => 'Customer']
               
            ]
        );
    
       
        //Seeding admin
        DB::table('users')->insert([
                [ 'type_id'=>1, 'email' => 'admin@camcyber.com', 'phone' => '0965416704', 'password' => bcrypt('123456')],
                [ 'type_id'=>1, 'email' => 'admin2@camcyber.com', 'phone' => '0111112', 'password' => bcrypt('xxxxxx')],
                [ 'type_id'=>1, 'email' => 'admin3@camcyber.com', 'phone' => '0111113', 'password' => bcrypt('xxxxxx')],
            ]);
        DB::table('admins')->insert(
            [
                [ 'user_id' =>1, 'is_supper'=>1, 'name'=>'Admin 1', 'avatar' => 'public/user/image/ppl.png' ],
                [ 'user_id' =>2, 'is_supper'=>0, 'name'=>'Admin 2', 'avatar' => 'public/user/image/ppl.png' ],
                [ 'user_id' =>3, 'is_supper'=>0, 'name'=>'Admin 2', 'avatar' => 'public/user/image/ppl.png' ],
            ]);

      

    }
}
