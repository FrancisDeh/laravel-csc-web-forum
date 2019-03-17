<?php

use Illuminate\Database\Seeder;

class ProgrammesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programmes')->insert([
        	['id' => 1, 'name' => 'B.Sc. Computer Science'],
        	['id' => 2, 'name' => 'B.Ed. Computer Science'],
        	['id' => 3, 'name' => 'B.Sc. Information Technology']
        ]);
    }
}
