<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('groups')->insert([
         	['name' => 'Sales'],
            ['name' => 'IT'],
            ['name' => 'Administrators'],
        ]);   
    }
}
