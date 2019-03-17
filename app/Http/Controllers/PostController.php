<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
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
        $categories = Category::get();
        return view('frontend.chatroom.pages.createpost')->withCategories($categories);
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
        //dd($request->all());
        //validate
        $this->validate($request, [
            'titleOfPost' => 'required|max:255|unique:posts,title',
            'categoryOfPost' => 'required',
            'message' => 'required',
            'code' => 'sometimes'
        ]);
        //save
        $post = new Post;
        $post->title = ucfirst($request->titleOfPost);
        $post->category_id = $request->categoryOfPost;
        $post->message = $request->message;
        $post->code = $request->code;
        $post->user_id = auth()->user()->id; //auth()->member()->id;
        $post->save();
       
        //session
        session()->flash('success', 'Your post has been Created successfuly');
        return redirect()->route('post.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
           
        return view('frontend.chatroom.pages.showpost')->withPost($post);
    }

    /*A post has a comment, a comment has a reply, comments are
    directly related to posts, but replies are not. Given a reply id, we can use the replies's
    commentable_id to find the post associated with the comment*/

     public function getPostId($id)
    {
            $comment = Comment::where('commentable_type', 'App\Post')
                            ->where('id', $id)
                            ->first();
             //send the post object to the post.show               
            return redirect()->route('post.show', $comment->commentable_id);
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        $categories = Category::get();
        return view('frontend.chatroom.pages.editpost')->withPost($post)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
        if($request->titleOfPost == $post->title){
            $this->validate($request, [
            'titleOfPost' => 'required|max:255',
            'categoryOfPost' => 'required',
            'message' => 'required',
            'code' => 'sometimes'
        ]);

        } else {
            $this->validate($request, [
            'titleOfPost' => 'required|max:255|unique:posts,title',
            'categoryOfPost' => 'required',
            'message' => 'required',
            'code' => 'sometimes'
        ]);

        }
        
        //save
        $post->title = ucfirst($request->titleOfPost);
        $post->category_id = $request->categoryOfPost;
        $post->message = $request->message;
        $post->code = $request->code;
        $post->user_id = auth()->user()->id; //auth()->member()->id;
        $post->save();
       
        //session
        session()->flash('success', 'Your post has been updated successfuly!');
        return view('frontend.chatroom.pages.showpost')->withPost($post);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //first check if post has comments and replies
        //delete replies first, if any
        //deletes likes of comments
        //delete comments next if any
        //deletes likes of post
        //delete the post

        
         /*deletes likes of comments*/
         foreach ($post->comments as $key => $replies) {
             $replies->likes()->delete();
         }

         /*deletes replies/comments of comments*/
         foreach ($post->comments as $key => $replies) {
             $replies->comments()->delete();
         }
       
        /*deletes comments of post*/
        $post->comments()->delete();

        /*deletes likes of post*/
        $post->likes()->delete();

         /*deletes post*/
        $post->delete();

        session()->flash('success', 'Post has been successfully deleted!');
        return redirect()->back();
    }

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
       public function searchPostHits(Request $request){

        $value = $request->searchTerm;
        

         $posts = Post::where('title','LIKE', '%'. $value .'%')->where('approved', 1)->orderBy('title')->get();
        
    
       $message = "<\Search Matching " . $value . ">";
       return view('frontend.chatroom.pages.posts')->withPosts($posts);
       }
}
