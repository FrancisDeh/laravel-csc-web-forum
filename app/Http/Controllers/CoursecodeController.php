<?php

namespace App\Http\Controllers;
use App\Course;
use App\Coursecode;
use Illuminate\Http\Request;
use App\Http\Controllers\CourseController;


class CoursecodeController extends Controller
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
        $coursecodes = Coursecode::orderBy('name')->get();
        return view('backend.pages.coursecodes')->with(['coursecodes' => $coursecodes]);
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
            'name' => 'required|string|max:255|unique:coursecodes,name'
        ]);

        $coursecode = new Coursecode;
        $coursecode->name = $request->name;
        $coursecode->save();

        session()->flash('success', "Course Code Created Successfully");
        return redirect()->route('coursecodes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coursecode  $coursecode
     * @return \Illuminate\Http\Response
     */
    public function show(Coursecode $coursecode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coursecode  $coursecode
     * @return \Illuminate\Http\Response
     */
    public function edit(Coursecode $coursecode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coursecode  $coursecode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coursecode $coursecode)
    {
      
        if($request->name == $coursecode->name ){
            $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        } else {

            $this->validate($request, [
            'name' => 'required|string|max:255|unique:coursecodes,name'
        ]);

        }
        

      
        $coursecode->name = $request->name;
        $coursecode->save();

        session()->flash('success', "Course Code Updated Successfully");
        return redirect()->route('coursecodes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coursecode  $coursecode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coursecode $coursecode)
    {
         
        $controller = new CourseController;
        if ($coursecode->course()->count() == 1) {
            if($controller->deleteCourseTree($coursecode->course)){
                $coursecode->delete();
            }
        }
        else{
             $coursecode->delete();
        }

        session()->flash('success', "Course Code Deleted Successfully");
        
        return redirect()->route('coursecodes.index');
    }
    
}
