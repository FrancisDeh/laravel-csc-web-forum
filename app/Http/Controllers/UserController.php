<?php

namespace App\Http\Controllers;
use App\User;
use Storage;
use File;
use App\Programme;
use App\ProgrammingLanguage;
use Illuminate\Http\Request;

class UserController extends Controller
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
        //
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
        //
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


    public function getProfilePage($id)
    {
        $user = User::find($id);
        //user's codes
        $codes = $user->posts()->where('category_id', 2)->where('approved', 1)->orderBy('title')->get();
        $questions = $user->posts()->where('category_id', 1)->where('approved', 1)->orderBy('title')->get();
        $publications = $user->posts()->where('category_id', 3)->where('approved', 1)->orderBy('title')->get();
        $repositories = $user->repository()->orderBy('name')->get();
        $comments = $user->comments()->where('commentable_type', 'App\Post')->orderBy('created_at')->get();
        $replies = $user->comments()->where('commentable_type', 'App\Comment')->orderBy('created_at')->get();
        $pending = $user->posts()->where('approved', 0)->orderBy('title')->get();

        return view('frontend.chatroom.pages.profile')
        ->with(['user' => $user, 
                'codes' => $codes,
                'questions' => $questions,
                'publications' => $publications,
                'repositories' => $repositories,
                'comments' =>$comments,
                'pending' => $pending,
                'replies' => $replies]);
    }


    public function editProfile(){
        $programmes = Programme::get();
        $languages = ProgrammingLanguage::get();
        //languages

        //setup online
        $user = User::find(auth()->user()->id);
        $user->online_status = 1;
        if($user->save()){
         return view('frontend.chatroom.pages.profileedit')
         ->with([
                 'programmes' => $programmes,
                 'languages' => $languages
                ]);
        }
        
    }

    public function updateAuthInfo(Request $request, $id){
       // email
       // password
       // pasword authentication
         $user = User::find($id);
        if($request->email == $user->email){
           $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]); 
        } else {
            $this->validate($request, [
            'email' => 'required|email|unique:members,email',
            'password' => 'required|confirmed|min:8'
        ]); 
        }
        
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if($user->save()){
            session()->flash('success', 'Authentication Details Successfully Updated');
            return redirect()->back();
        }

    }

     public function updateProfilePictureInfo(Request $request, $id){
        //image
        $this->validate($request, [
            'image' => 'required|image'
        ]);

        $user = User::find($id);

        //since the old image will bear the same name as the new on,
        //delete the old one before adding the new one
        //ensure that the image name is not the default image name
        $oldImage = $user->image;
         if($oldImage !== 'img.jpg'){

            //delete the old image
            Storage::delete('public/profile/'.$oldImage);
        }


        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = strtolower($user->fname).'_'.strtolower($user->sname) . '.' . $image->getClientOriginalExtension();

             $location = storage_path($filename);
            Storage::disk('local')->put('public/profile/'.$filename, File::get($image));

            $user->image = $filename;
        }

        if($user->save()){
            session()->flash("success", "Profile Picture Successfully Updated!");
            return redirect()->back();
        }
    }

     public function updatePersonalInfo(Request $request, $id){
        //fname
        //sname
        //username
        //gender
        //whatsapp contact
        //other contact
        //facebook handle
        //programme id
        //level
        //programming language id
        //bio

        $user = User::find($id);
        
            $this->validate($request, [
            'firstName' => 'required|max:60',
            'surname' => 'required|max:120',
            'gender' => 'required',
            'whatsappContact' => 'required|max:10',
            'otherContact' => 'required|max:10',
            'facebookHandle' => 'sometimes',
            'programmeId' => 'required|integer',
            'level' => 'required',
            'programmingLanguadeId' => 'sometimes',
            'bio' => 'sometimes'
        ]);
  

        $user->fname = ucfirst($request->firstName);
        $user->sname = ucfirst($request->surname);
        $user->gender = $request->gender;
        $user->whatsapp_contact = $request->whatsappContact;
        $user->other_contact = $request->otherContact;
        $user->facebook_handle = $request->facebookHandle;
        $user->programme_id = $request->programmeId;
        $user->level = $request->level;
        $user->bio = $request->bio;

        if($user->save()){
            if($user->language()->sync($request->programmingLanguageId)){
               session()->flash("success", "Personal Information is Successfully Updated");
                return redirect()->back(); 
            }
            
        }

        
    }
}
