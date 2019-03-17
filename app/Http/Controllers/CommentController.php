<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }


    public function addPostComment(Request $request, Post $post){

        
        $this->validate($request, [
            'message' => 'required',
            'categoryOfComment' => 'required',
            'code' => 'sometimes'
        ]);

        // return auth()->user()->id;

        $comment = new Comment;
        $comment->user_id = auth()->user()->id;
        $comment->message = $request->message;
        $comment->message_type = $request->categoryOfComment;
        $comment->code = $request->code;
        $post->comments()->save($comment);

        session()->flash('success', 'Comment has been successfully created!');
        /*
        when return redirect()->back() is used here, the user is redirected back to the page on which the comment was made. this work for a post selected from the main posts page.

        on the contrary, when a user freshly creates a post, the user is sent to a show page. If instantly the user creates a comment, the redirect()->back() redirects user to the page on which the post was created, not the page on which the comment was made.

        In other to solve this problem, we return the showpost view with the post id.
        */
        return redirect()->route('post.show', $post);
       

    }

    public function addCommentReply(Request $request, Comment $comment){

      
        $this->validate($request, [
            'message' => 'required',
            'categoryOfReply' => 'required',
            'code' => 'sometimes'
        ]);


        $reply = new Comment;
        $reply->user_id = auth()->user()->id;
        $reply->message = $request->message;
        $reply->message_type = $request->categoryOfReply;
        $reply->code = $request->code;
        $comment->reply()->save($reply);

        //find the id of the comment this reply is made to.
        //use the id to find the post using "where commentable id is" clause on the query
      
        $post = Post::find($comment->commentable_id);


        session()->flash('success', 'Reply has been successfully created!');

        return redirect()->route('post.show', $post);

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
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
