<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
class SemesterController extends Controller
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
    {   $semesters = Semester::get();
        return view('backend.pages.semesters')->with(['semesters' => $semesters]);
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

        $semester = new Semester;
        $semester->name = $request->name;
        $semester->save();

        session()->flash('success', "Semester Created Successfully");
        return redirect()->route('semesters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        if($request->name == $semester->name ){
            $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        } else {

            $this->validate($request, [
            'name' => 'required|string|max:255|unique:semesters,name'
        ]);

        }
      
        $semester->name = $request->name;
        $semester->save();

        session()->flash('success', "Semester Updated Successfully");
        return redirect()->route('semesters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
