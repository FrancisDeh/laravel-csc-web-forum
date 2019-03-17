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
        $this->call(PostCategoriesSeeder::class);
        $this->call(CoursecodesTableSeeder::class);
        $this->call(CoursenamesTableSeeder::class);
        $this->call(ProgrammesTableSeeder::class);
        $this->call(SemesterTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(ProgrammingLanguagesTableSeeder::class);
    }
}
