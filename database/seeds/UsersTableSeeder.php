<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
         	['name' => 'Sanaa',
			 'email'=> 'sanae.bakkar@gmail.com',
			 'password'=> bcrypt('adminadmin'),
			 'departement_id'=> '6',
			 'role_id'=> '5',
			 'group_id'=>'2',
			 'admin'=>'1',
			
			],
			
	   ]);   
    }
}

