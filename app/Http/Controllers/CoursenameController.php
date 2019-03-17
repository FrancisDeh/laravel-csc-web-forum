<?php

namespace App\Http\Controllers;

use App\Coursename;
use Illuminate\Http\Request;
use App\Http\Controllers\CourseController;


class CoursenameController extends Controller
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

        $coursenames = Coursename::orderBy('name')->get();
        return view('backend.pages.coursenames')->with(['coursenames' => $coursenames]);
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
            'name' => 'required|string|max:255|unique:coursenames,name'
        ]);

        $coursename = new Coursename;
        $coursename->name = $request->name;
        $coursename->save();

        session()->flash('success', "Course Name Created Successfully");
        return redirect()->route('coursenames.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coursename  $coursename
     * @return \Illuminate\Http\Response
     */
    public function show(Coursename $coursename)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coursename  $coursename
     * @return \Illuminate\Http\Response
     */
    public function edit(Coursename $coursename)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coursename  $coursename
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coursename $coursename)
    {
        
        if($request->name == $coursename->name ){
            $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        } else {

            $this->validate($request, [
            'name' => 'required|string|max:255|unique:coursenames,name'
        ]);

        }
        

      
        $coursename->name = $request->name;
        $coursename->save();

        session()->flash('success', "Course Name Updated Successfully");
        return redirect()->route('coursenames.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coursename  $coursename
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coursename $coursename)
    {
        $controller = new CourseController;
        if ($coursename->course()->count() == 1) {
            if($controller->deleteCourseTree($coursename->course)){
                $coursename->delete();
            }
        }
        else{
             $coursename->delete();
        }

        session()->flash('success', "Course Name Deleted Successfully");
        
        return redirect()->route('coursenames.index');
    }
}
