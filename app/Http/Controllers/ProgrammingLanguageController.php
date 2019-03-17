<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgrammingLanguage;

class ProgrammingLanguageController extends Controller
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
        return view('backend.pages.programminglanguages');
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
            'name' => 'required|string|max:255|unique:programming_languages,name'
        ]);

        $language = new ProgrammingLanguage;
        $language->name = $request->name;
        $language->save();

        session()->flash('success', "Programming Language Created Successfully");
        return redirect()->route('languages.index');
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
    public function update(Request $request, $id)
    {  

        $language = ProgrammingLanguage::find($id);

        if($request->name == $language->name ){
            $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        } else {

            $this->validate($request, [
            'name' => 'required|string|max:255|unique:programming_languages,name'
        ]);

        }
        

      
        $language->name = $request->name;
        $language->save();

        session()->flash('success', "Programming Language Updated Successfully");
        return redirect()->route('languages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = ProgrammingLanguage::find($id);
        //delete all associated users if any
        if($language->user()->count() > 0){
            $language->user()->detach();
        }
        //delete language
        if($language->delete()){
            session()->flash('success', 'Programming Language is Successfully deleted!');
            return redirect()->back();
        }

       
    }
}
