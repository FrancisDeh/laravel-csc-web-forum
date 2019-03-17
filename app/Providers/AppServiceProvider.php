<?php

namespace App\Providers;
use Schema;
use App\Post;
use App\Event;
use App\User;
use App\Semester;
use App\Coursecode;
use App\Coursename;
use App\Programme;
use App\ProgrammingLanguage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (Schema::hasTable('posts') && Schema::hasTable('users') && Schema::hasTable('programmes') && Schema::hasTable('programming_languages') && Schema::hasTable('semesters') && Schema::hasTable('coursecodes') && Schema::hasTable('coursenames') && Schema::hasTable('events')) {
        

        //Get the count of all the posts and their different types
        $allposts = Post::where('approved', 1)->get();
        $posts = $allposts->count();
        $questions = $allposts->where('category_id', 1)->count();
        $codes = $allposts->where('category_id', 2)->count();
        $publications = $allposts->where('category_id', 3)->count();

        $disapproved = Post::where('approved', 0)->count();

        //get data for users page
        $programmes = Programme::get();
        $languages = ProgrammingLanguage::get();

        //get data for events carousel
        $events = Event::orderBy('created_at')->get();

        //get users for admin section
        $users = User::get();

        //courses, course codes, semsters
        $semesters = Semester::get();
        $coursecodes = Coursecode::orderBy('name')->get();
        $coursenames = Coursename::orderBy('name')->get();


        $public_data = [
            'disapproved' => $disapproved,
            'users' => $users,
            'events' => $events,
            'posts' => $posts,
            'questions' => $questions,
            'codes' => $codes,
            'publications' => $publications,
            'programmes' => $programmes,
            'languages' => $languages,
            'semesters' => $semesters,
            'coursecodes' => $coursecodes,
            'coursenames' => $coursenames
        ];


        view()->share('public_data', $public_data);

        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
