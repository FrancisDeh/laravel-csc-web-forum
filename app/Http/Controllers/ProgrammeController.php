<?php

namespace App\Http\Controllers;

use App\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
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
        $programmes = Programme::orderBy('name')->get();
        return view('backend.pages.programmes')->with(['programmes' => $programmes]);
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

        $programme = new Programme;
        $programme->name = $request->name;
        $programme->save();

        session()->flash('success', "Programme Created Successfully");
        return redirect()->route('programmes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme $programme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme $programme)
    {
         if($request->name == $programme->name ){
            $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        } else {

            $this->validate($request, [
            'name' => 'required|string|max:255|unique:programmes,name'
        ]);

        }
      
        $programme->name = $request->name;
        $programme->save();

        session()->flash('success', "Programme Updated Successfully");
        return redirect()->route('programmes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme $programme)
    {
        //
    }
}
