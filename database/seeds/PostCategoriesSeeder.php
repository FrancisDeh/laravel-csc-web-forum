<?php

use Illuminate\Database\Seeder;

class PostCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	['id' => 1, 'name' => 'Question'],
        	['id' => 2, 'name' => 'Code'],
        	['id' => 3, 'name' => 'Publication']
        ]);
    }
}
