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
        DB::table('users')->insert([
    		'id'					=>	1,
            'name' 					=>	'admin',
            'email' 				=>	'admin@mail.com',
            'password' 				=> 	bcrypt('123456'),
            'user_type'				=> 'Admin',
        ]);
    }
}
