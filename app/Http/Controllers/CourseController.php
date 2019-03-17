<?php

namespace App\Http\Controllers;

use App\Course;
use App\Repository;
use Storage;
use Illuminate\Http\Request;

class CourseController extends Controller
{
     public function __construct(){
        return $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $courses = Course::orderBy('level')->orderBy('semester_id')->get();
        return view('backend.pages.courses')->with(['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'level' => 'required|integer',
            'programmeId' => 'required|integer',
            'coursecodeId' => 'required|integer|unique:courses,coursecode_id',
            'coursenameId' => 'required|integer|unique:courses,coursename_id',
            'semesterId' => 'required|integer'
        ]);

        $course = new Course;
        $course->level = $request->level;
        $course->semester_id = $request->semesterId;
        $course->programme_id = $request->programmeId;
        $course->coursecode_id = $request->coursecodeId;
        $course->coursename_id = $request->coursenameId;
        $course->save();

        session()->flash('success', "Course Created Successfully");
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        if(($request->coursecodeId == $course->coursecode_id) && !($request->coursenameId == $course->coursename_id )){
            $this->validate($request, [
            'level' => 'required|integer',
            'programmeId' => 'required|integer',
            'coursecodeId' => 'required|integer',
            'coursenameId' => 'required|integer|unique:courses,coursename_id',
            'semesterId' => 'required|integer'
        ]);

        } 
        elseif (($request->coursenameId == $course->coursename_id) && !($request->coursecodeId == $course->coursecode_id)) {
             $this->validate($request, [
            'level' => 'required|integer',
            'programmeId' => 'required|integer',
            'coursecodeId' => 'required|integer|unique:courses,coursecode_id',
            'coursenameId' => 'required|integer',
            'semesterId' => 'required|integer'
        ]);

        } 

        elseif (($request->coursenameId == $course->coursename_id) && ($request->coursecodeId == $course->coursecode_id ) ) {
             $this->validate($request, [
            'level' => 'required|integer',
            'programmeId' => 'required|integer',
            'coursecodeId' => 'required|integer',
            'coursenameId' => 'required|integer',
            'semesterId' => 'required|integer'

        ]);

        }
        else {            
            $this->validate($request, [
            'level' => 'required|integer',
            'programmeId' => 'required|integer',
            'coursecodeId' => 'required|integer|unique:courses,coursecode_id',
            'coursenameId' => 'required|integer|unique:courses,coursename_id',
            'semesterId' => 'required|integer'
        ]);


        }
      

        
        $course->level = $request->level;
        $course->semester_id = $request->semesterId;
        $course->programme_id = $request->programmeId;
        $course->coursecode_id = $request->coursecodeId;
        $course->coursename_id = $request->coursenameId;
        $course->save();

        session()->flash('success', "Course Updated Successfully");
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, $redirectPath = 'courses.index')
    {
        $this->deleteCourseTree($course);
        session()->flash('success', "Course Deleted Successfully");

        return redirect()->route($redirectPath);
    }


    public function deleteCourseTree($course)
    {
        if ($course->repository()->count() > 0) {

            $files = Repository::select('name')->where('course_id', $course->id)->get();
            foreach ($files as $file) {
                Storage::delete('public/repository/course_materials/'.$file->name);
            }
            Repository::where('course_id', $course->id)->delete();
        }

        if($course->delete()){
            return true;
        }
        else{
            return false;
        }
    }
}