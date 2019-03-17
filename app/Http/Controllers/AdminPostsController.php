<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use App\Coursename;
use App\Coursecode;
use App\User;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
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

    public function index(){
    	$posts = Post::where('approved', 1)->get();

    	return view('backend.pages.posts')->withPosts($posts);
    }

    public function getCategorizedPosts($description){
    	$id = $this->getCategoryBySwitch($description);

    	$posts = Post::where('category_id', $id)->where('approved', 1)->get();

    	$message = "All " . ucfirst($description);
    	return view('backend.pages.posts')->withPosts($posts)->withMessage($message);

	}

	public function getPendingPosts(){
		$posts = Post::where('approved', 0)->get();

		$message = "All Pending Posts";
    	return view('backend.pages.posts')->withPosts($posts)->withMessage($message);
	}

	public function getSinglePost($id){
		
	
		$post = Post::find($id);
		
		return view('backend.pages.singleposts')->withPost($post);
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

    public function approvePost($id){
    	$post = Post::find($id);
    	$post->approved = 1;
    	$post->save();

    	session()->flash('success', "Post Successfully Approved");
    	return redirect()->back();
    }
    public function disApprovePost($id){
    	$post = Post::find($id);
    	$post->approved = 0;
    	$post->save();

    	session()->flash('success', "Post Successfully Rejected");
    	return redirect()->back();
    }

    public function approveComment($id)
    {

        $comment = Comment::find($id);
        $comment->approved = 1;
        $comment->update();

        session()->flash('success', "Comment Successfully Approved");
        return redirect()->back();
    }

      public function disApproveComment($id)
    {
        $comment = Comment::find($id);
        $comment->approved = 0;
        $comment->update();

        session()->flash('success', "Comment Successfully Rejected");
        return redirect()->back();
    }

     //this function will return search hits
    public function searchUser(Request $request){
        $term = $request->term;

         $user = User::where('fname', 'LIKE', '%' . $term . '%')
                                ->orWhere('sname', 'LIKE', '%'. $term . '%')
                                ->get();


            if(count($user) == 0)
            {
                $searchResult[] =  "No item Found";
            } else
            {
                foreach ($user as $key => $value)
                {

                    $searchResult[] = $value->sname;
                }
            }
        
        return $searchResult;
    }

    /*this function displays search page with possible hits*/
       // public function searchUserHits(Request $request){

       //  $value = $request->searchTerm;
        

       //   $users = User::where('fname','LIKE', '%'. $value .'%')->orWhere('sname', 'LIKE', '%'. $value . '%')->orderBy('fname')->get();
        
    
       // $message = "<\Search Matching " . $value . ">";
       //  return view('frontend.chatroom.pages.allusers')->withUsers($users)->withMessage($message);
       // }

        //this function will return search hits
    public function searchPost(Request $request){
        $term = $request->term;

         $post = Post::where('title', 'LIKE', '%' . $term . '%')
                                ->where('approved', 1)->get();


            if(count($post) == 0)
            {
                $searchResult[] =  "No item Found";
            } else
            {
                foreach ($post as $key => $value)
                {

                    $searchResult[] = $value->title;
                }
            }
        
        return $searchResult;
    }

    /*this function displays search page with possible hits*/
       // public function searchPostHits(Request $request){

       //  $value = $request->searchTerm;
        

       //   $posts = Post::where('title','LIKE', '%'. $value .'%')->where('approved', 1)->orderBy('title')->get();
        
    
       // $message = "<\Search Matching " . $value . ">";
       // return view('frontend.chatroom.pages.posts')->withPosts($posts);
       // }

        //this function will return search hits
    public function searchCourseCode(Request $request){
        $term = $request->term;

         $coursecode = Coursecode::where('name', 'LIKE', '%' . $term . '%')
                                ->get();


            if(count($coursecode) == 0)
            {
                $searchResult[] =  "No item Found";
            } else
            {
                foreach ($coursecode as $key => $value)
                {

                    $searchResult[] = $value->name;
                }
            }
        
        return $searchResult;
    }

    /*this function displays search page with possible hits*/
       // public function searchCourseCodeHits(Request $request){

       //  $value = $request->searchTerm;
        

       //   $coursecodes = Coursecode::where('name','LIKE', '%'. $value .'%')->get();
        
    
       // $message = "<\Search Matching " . $value . ">";
       // return view('frontend.chatroom.pages.posts')->withPosts($coursecodes);
       // }

        //this function will return search hits
    public function searchCourseName(Request $request){
        $term = $request->term;

         $coursename = Coursename::where('name', 'LIKE', '%' . $term . '%')
                                ->get();


            if(count($coursename) == 0)
            {
                $searchResult[] =  "No item Found";
            } else
            {
                foreach ($coursename as $key => $value)
                {

                    $searchResult[] = $value->name;
                }
            }
        
        return $searchResult;
    }

    /*this function displays search page with possible hits*/
       // public function searchCourseNameHits(Request $request){

       //  $value = $request->searchTerm;
        

       //   $coursenames = Coursename::where('title','LIKE', '%'. $value .'%')->where('approved', 1)->orderBy('title')->get();
        
    
       // $message = "<\Search Matching " . $value . ">";
       // return view('frontend.chatroom.pages.posts')->with($coursenames);
       // }



}

