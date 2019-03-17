<?php

namespace App\Http\Controllers;
use App\Developer;
use Storage;
use File;
use Illuminate\Http\Request;

class DevelopersProfileController extends Controller
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
        $developers = Developer::all();
        return view('backend.pages.developers')->withDevelopers($developers);
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
            'firstName' => 'required|max:60',
            'surname' => 'required|max:120',
            'description' => 'required|max:250',
            'workField' => 'required|max:60',
            'facebookHandle' => 'required|max:250',
            'twitterHandle' => 'required|max:250',
            'email' => 'required|email|unique:developers,email',
            'image' => 'sometimes|image'
            ]);

        $developer = new Developer;
        $developer->fname = $request->firstName;
        $developer->sname = $request->surname;
        $developer->email = $request->email;
        $developer->description = $request->description;
        $developer->work_field = $request->workField;
        $developer->fbhandle = $request->facebookHandle;
        $developer->twitterhandle = $request->twitterHandle;
        $developer->instagramhandle = $request->instagramHandle;
        $developer->gplushandle = $request->googlePlusHandle;
        $developer->linkedinhandle = $request->linkedinHandle;
       
         if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = strtolower($request->firstName).'_'.strtolower($request->surname) . '.' . $image->getClientOriginalExtension();

             $location = storage_path($filename);
            Storage::disk('local')->put('public/devprofile/'.$filename, File::get($image));

            $developer->image = $filename;
        }


        if($developer->save()){
            session()->flash('success', 'Admin Successfully Added');
            return redirect()->back();
        }
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
    public function update(Request $request, Developer $developer)
    {
        if ($request->email == $developer->email) {
            $this->validate($request, [
            'firstName' => 'required|max:60',
            'surname' => 'required|max:120',
            'description' => 'required|max:500',
            'workField' => 'required|max:60',
            'facebookHandle' => 'required|max:250',
            'twitterHandle' => 'required|max:250',
            'email' => 'required|email',
            'image' => 'sometimes|image'
            ]);
        }
        else{
            $this->validate($request, [
            'firstName' => 'required|max:60',
            'surname' => 'required|max:120',
            'description' => 'required|max:250',
            'workField' => 'required|max:60',
            'facebookHandle' => 'required|max:250',
            'twitterHandle' => 'required|max:250',
            'email' => 'required|email|unique:developers,email',
            'image' => 'sometimes|image'
            ]);
        }

        

        $developer->fname = $request->firstName;
        $developer->sname = $request->surname;
        $developer->email = $request->email;
        $developer->description = $request->description;
        $developer->work_field = $request->workField;
        $developer->fbhandle = $request->facebookHandle;
        $developer->twitterhandle = $request->twitterHandle;
        $developer->instagramhandle = $request->instagramHandle;
        $developer->gplushandle = $request->googlePlusHandle;
        $developer->linkedinhandle = $request->linkedinHandle;
        $oldImage = $developer->image;
        
        

        if($request->hasFile('image')){

            if($oldImage !== 'img.jpg'){
            //delete the old image
            Storage::delete('public/devprofile/'.$oldImage);
        }

            $image = $request->file('image');
            $filename = strtolower($request->firstName).'_'.strtolower($request->surname) . '.' . $image->getClientOriginalExtension();

            $location = storage_path($filename);
            Storage::disk('local')->put('public/devprofile/'.$filename, File::get($image));

            $developer->image = $filename;
        }


        if($developer->save()){
            session()->flash('success', 'Admin Successfully Updated');
            return redirect()->back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Developer $developer)
    {
        if ($developer->image != 'img.jpg') {
            Storage::delete('public/devprofile/'.$developer->image);
        }
        if($developer->delete()){
            session()->flash('success', 'Developer Successfully Deleted');
            return redirect()->back();
        }
        else{
             session()->flash('error', 'Sorry an error occured');
            return redirect()->back();
        }
    }
}
