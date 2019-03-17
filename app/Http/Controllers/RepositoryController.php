<?php

namespace App\Http\Controllers;

use App\Repository;
use Illuminate\Http\Request;
use App\Course;
use App\Coursename;
use File;
use App\Programme;
use Storage;



class RepositoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $courses = Course::get();
      
        return view('frontend.chatroom.pages.uploadfile')->withCourses($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fileName' => 'required|max:60|unique:repositories,name',
            'file' => 'required|file',            
            'course' =>'required',
            'fileDescription' => 'required|max:1000' 
        ]);

        // dd($request);

        $repository = new Repository;
        
        $repository->description = $request->fileDescription;
        $repository->course_id = $request->course;
        $repository->user_id = 1;
        $file = $request->file('file');
        $repository->format = $file->getClientOriginalExtension();
        $repository->size = $_FILES['file']["size"];

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = ucwords($request->fileName). '.' . $file->getClientOriginalExtension();

             $location = storage_path($filename);
            Storage::disk('local')->put('public/repository/course_materials/'.$filename, File::get($file));
            $repository->name = $filename;
          
        }
        $repository->save();

        session()->flash('success', 'File has been successfully uploaded');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(Repository $repository)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function edit(Repository $repository)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repository $repository)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repository $repository)
    {
       if($repository->delete()){
        session()->flash('success', 'File has been successfuly Deleted');
        return redirect()->back();
       }
       
    }

    public function getCourseMaterials($programme_id, $level)
    {
        $courses1 = Course::where('programme_id', $programme_id)->
                            where('level', $level)->
                            where('semester_id', 1)->
                            get();

        

        $courses2 = Course::where('programme_id', $programme_id)->
                            where('level', $level)->
                            where('semester_id', 2)->
                            get();

        $message = "" . Programme::find($programme_id)->name . " (Level " . $level . ")"; 

        return view('frontend.chatroom.pages.showrepository')->with(
            [   
                'message' => $message,
                'courses1' => $courses1,
                'courses2' => $courses2
            ]
        );   
    }
}
