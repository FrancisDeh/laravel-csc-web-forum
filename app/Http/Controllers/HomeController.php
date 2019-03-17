<?php

namespace App\Http\Controllers;
use App\Developer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers = Developer::all();
        return view('frontend.getting_started.pages.landing')->withDevelopers($developers);
    }
}
