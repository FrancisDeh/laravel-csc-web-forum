<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Programme;
use App\ProgrammingLanguage;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.dashboard');
    }

    public function getPlatformUsers(){
        
        $users = User::orderBy('fname')->get();
        return view('backend.pages.platformusers')
        ->with(['users' => $users,
            ]);
    }

    public function getPlatformUsersByProgramme($name, $id){
    
        $users = User::where('programme_id', $id)->get();
        $message = "<\ " . $name . ">";
        return view('backend.pages.platformusers')->withUsers($users)->withMessage($message);
    }

    public function getPlatformUsersByGender($gender){
        //holds full word for gender
        $fullgender;
        $users = User::where('gender', $gender)->get();

        switch ($gender) {
            case 'm':
                $fullgender = "Males";
                break;
            case 'f':
                $fullgender = "Females";
                break;
            default:
                # code...
                break;
        }

        $message = "<\All ". $fullgender . ">";
        return view('backend.pages.platformusers')->withUsers($users)->withMessage($message);
    }

    public function getPlatformUsersByLevel($level){
    
        $users = User::where('level', $level)->get();
        $message = "<\All Level ". $level. ">";
        return view('backend.pages.platformusers')->withUsers($users)->withMessage($message);
    }

    public function getPlatformUsersByLanguage($name, $id){
    
        $users = ProgrammingLanguage::find($id)->user;

        $message = "<\All " . $name . " Programmers>";
        return view('backend.pages.platformusers')->withUsers($users)->withMessage($message);
    }

    public function getPlatformUserProfilePage($id){
         $user = User::find($id);
        //user's codes
        $codes = $user->posts()->where('category_id', 2)->orderBy('title')->get();
        $questions = $user->posts()->where('category_id', 1)->orderBy('title')->get();
        $publications = $user->posts()->where('category_id', 3)->orderBy('title')->get();
        $repositories = $user->repository()->orderBy('name')->get();
        $comments = $user->comments()->where('commentable_type', 'App\Post')->orderBy('created_at')->get();
        $replies = $user->comments()->where('commentable_type', 'App\Comment')->orderBy('created_at')->get();

        return view('backend.pages.platformusersprofile')
        ->with(['user' => $user, 
                'codes' => $codes,
                'questions' => $questions,
                'publications' => $publications,
                'repositories' => $repositories,
                'comments' =>$comments,
                'replies' => $replies]);
    }

    public function adminIndex()
    {
        $admins = Admin::all();
        return view('backend.pages.admins')->withAdmins($admins);
    }

    public function createAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:admins,name',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed|min:8'
        ]); 

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);

        if($admin->save()){
            session()->flash('success', 'Admin Successfully Added');
            return redirect()->back();
        }
    }

    public function updateAdmin(Request $request, Admin $admin){
       // email
       // password
       // pasword authentication
        if($request->email == $admin->email && $request->name != $admin->name){
           $this->validate($request, [
            'name' => 'required|unique:admins,name',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]); 
        } 
        elseif ($request->email != $admin->email && $request->name == $admin->name) {
            $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed|min:8'
            ]);
        }

        else {
            $this->validate($request, [
            'name' => 'required|unique:admins,name',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|confirmed|min:8'
            ]); 
        }
        
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);

        if($admin->save()){
            session()->flash('success', 'Admin Updated Successfully');
            return redirect()->back();
        }

    }

    public function destroyAdmin(Admin $admin)
    {
        if($admin->delete()){
            session()->flash('success', 'Admin Deleted Successfully');
            return redirect()->back();
        }
        else{
             session()->flash('error', 'An Error Occurred');
            return redirect()->back();
        }
        
    }
}
