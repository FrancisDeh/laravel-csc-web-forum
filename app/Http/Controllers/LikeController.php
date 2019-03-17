<?php

namespace App\Http\Controllers;
use App\Post;
use App\Like;
use App\Comment;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function togglePostLike(Request $request){

    	$postId = $request->postId;
    	$post = Post::find($postId);

    	//first find if the user has liked this post already
    	$userLiked = $post->likes()->where('user_id', auth()->user()->id)->where('likable_id', $postId)->first();

    	if($userLiked){
    		//if it is already liked, unlike it, else like it
    		$like = Like::find($userLiked->id);
    		$like->delete();
    		return response()->json(['status' => 'success', 'message' => 'unliked']);
    	} else {
    		//new instance of like
    	$like = new Like;
    	$like->user_id = auth()->user()->id; //will be using auth()->user()->id;

    	$post->likes()->save($like);
    	return response()->json(['status' => 'success', 'message' => 'liked']);
    	}

    	
    }

    public function toggleCommentLike(Request $request){
    	$commentId = $request->commentId;
    	$comment = Comment::find($commentId);

    	

    	//first find if user has liked the comment already
    	$userLiked = $comment->likes()->where('user_id', auth()->user()->id)->where('likable_id', $commentId)->first();
   
    	if($userLiked){
    		//if it is already liked, unlike it, else like it
    		$like = Like::find($userLiked->id);
    		$like->delete();
    		return response()->json(['status' => 'success', 'message' => 'unliked']);
    	} else {
    		$like = new Like;
    		$like->user_id = auth()->user()->id; //will use auth()->user()->id

    		$comment->likes()->save($like);
    		return response()->json(['status' => 'success', 'message' => 'liked']);
    	}
    }
}
