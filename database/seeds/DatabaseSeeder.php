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
        // $this->call(UsersTableSeeder::class);

    	DB::table('pages')->insert([
    		'id'					=>	1,
            'name' 					=>	'Home',
            'title' 				=>	'Home',
            'content' 				=> 	'',
            'slug'					=> url('homepage'),
            'status'				=> 'Active',

        ]);


        // Default Menu
		DB::table('menus')->insert([
    		'id'					=>	1,
            'name' 					=>	'Main Menu',
            'title' 				=>	'Main Menu',
            'url' 					=> 	url('/'),

        ]);
        DB::table('menu_items')->insert([
    		'id'					=>	1,
            'name' 					=>	'homepage',
            'title' 				=>	'Homepage',
            'menu'					=> 1,
            'level'					=> 1,
            'order'					=> 1,
            'url' 					=> 	url('/'),

        ]);


    	// Default Settings
        DB::table('settings')->insert([
    		'id'					=>	1,
            'name' 					=>	'frontpage',
            'value' 				=>	1,
            'status' 				=> 	'Active',
        ]);
        DB::table('settings')->insert([
    		'id'					=>	2,
            'name' 					=>	'primary_menu',
            'value' 				=>	1,
            'status' 				=> 	'Active',
        ]);


        // Default Admin
        DB::table('users')->insert([
    		'id'					=>	1,
            'name' 					=>	'admin',
            'email' 				=>	'admin@mail.com',
            'password' 				=> 	bcrypt('123456'),
            'user_type'				=> 'ADMIN',
        ]);

    }
}
