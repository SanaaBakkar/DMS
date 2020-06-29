<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categories')->insert([
         	['name' => 'Finance and Accounting'],
            ['name' => 'Human Resources'],
            ['name' => 'Information Technology'],
            ['name' => 'Marketing'],
            ['name' => 'Sales'],
        ]);   
    }
}
