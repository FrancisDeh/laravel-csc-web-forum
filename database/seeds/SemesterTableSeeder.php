<?php

use Illuminate\Database\Seeder;

class SemesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semesters')->insert([
        	['id' => 1, 'name' => 'First Semester'],
        	['id' => 2, 'name' => 'Second Semester']     	
        ]);
    }
}
