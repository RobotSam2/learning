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
                [ 'type_id'=>1, 'email' => 'admin@admin.com', 'phone' => '087988771', 'password' => bcrypt('123456')],
                [ 'type_id'=>1, 'email' => 'admin2@admin.com', 'phone' => '0888707171', 'password' => bcrypt('123456')],
                [ 'type_id'=>1, 'email' => 'admin3@admin.com', 'phone' => '0888707171', 'password' => bcrypt('123456')],
            ]);
        DB::table('admins')->insert(
            [
                [ 'user_id' =>1, 'is_supper'=>1, 'name'=>'Admin 1', 'avatar' => 'public/user/image/ppl.png' ],
                [ 'user_id' =>2, 'is_supper'=>0, 'name'=>'Admin 2', 'avatar' => 'public/user/image/ppl.png' ],
                [ 'user_id' =>3, 'is_supper'=>0, 'name'=>'Admin 2', 'avatar' => 'public/user/image/ppl.png' ],
            ]);

      

    }
}
