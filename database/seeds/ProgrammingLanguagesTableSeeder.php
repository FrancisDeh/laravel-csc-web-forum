<?php

use Illuminate\Database\Seeder;

class ProgrammingLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('programming_languages')->insert([
        	['name' => 'Java'],
	        ['name' => 'HTML&CSS'],
	        ['name' => 'Laravel'],
	        ['name' => 'C++'],
	        ['name' => 'C'],
	        ['name' => 'Visual Basic'],
	        ['name' => 'MySQL'],
	        ['name' => 'Kotlin'],
	        ['name' => 'Android'],
	        ['name' => 'React'],
	        ['name' => 'Vue JS'],
	        ['name' => 'Node JS'],
	        ['name' => 'Angular JS'],
	        ['name' => 'Wordpress'],
	        ['name' => 'Cake PHP'],
	        ['name' => 'Bootstrap'],
	        ['name' => 'Python'],
	        ['name' => 'Perl'],
	        ['name' => 'PHP'],
	        ['name' => 'Adruino'],
	        ['name' => 'Raspberry'],
        ]);
        
    }
}
