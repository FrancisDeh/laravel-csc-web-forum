<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class PagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

	public function getPosts()
    {   
         $posts = Post::where('approved', 1)->orderBy('created_at', 'DESC')->get(); 
        return view('frontend.chatroom.pages.posts')->withPosts($posts);
    }


    public function getCategorizedPosts($description){
    	$id = $this->getCategoryBySwitch($description);

    	$posts = Post::where('category_id', $id)->where('approved', 1)->get();
    	return view('frontend.chatroom.pages.posts')->withPosts($posts);

	}
    	
    

    public function getCategoryBySwitch($description){
    	$id;
    	switch ($description) {
    		case 'codes':
    			$id = 2;
    			break;
    		case 'questions':
    			$id = 1;
    			break;
    		case 'publications':
    			$id = 3;
    			break;
    		
    		default:
    			# code...
    			break;
    	}

    	return $id;
    }

    public function getRepository()
    {

        //display the content of the repository to the user based on the users details
        //if the user has not fully provided the details, default values should be used
        $user = User::find(auth()->user()->id);

        if($user->level != null && $user->programme_id != null){
           return redirect()->route('getcoursematerials', ['programme_id' => $user->programme_id, 'level' => $user->level]);
        } else {
           return redirect()->route('getcoursematerials', ['programme_id' => 1, 'level' => 100]);
        }
        
    }

     public function getEvents()
    {
        return view('frontend.getting_started.pages.events');
    }
    public function getCreateEvent(){
        return view('frontend.getting_started.pages.create_events');
    }

}
