@extends('frontend.chatroom.pages.main')
@section('content')
	{{-- Form for post creation --}}
    {{--error and success notifications--}}
    @include('frontend.chatroom.partials.session._successmessage')
    @include('frontend.chatroom.partials.session._errormessage')

<section class="post-section">
<div class="white-box">
    <h3 class="box-title" style="font-size: 1.5em; color: orange;"><\{{$post->category->name }}></h3>
   	
    
    <div class="comment-center p-t-10">
        <div class="comment-body" >
            <div class="user-img"> 
                @if(Storage::disk('local')->has('public/profile/'.$post->user->image))
                            <img src="{{ route('userimage',['filename' => $post->user->image]) }}" alt="Circle Image" class="img-circle"  >    
                @endif
            </div>
            <div class="mail-contnet" style="">
            	<h2 class="post-title rm-mg-10">{{$post->title}}</h2>

                 @if (auth()->user()->id == $post->user->id)
                        <h5><a href="{{route('profile', $post->user->id) }}">me</a></h5>
                    @else
                         <h5><a href="{{route('profile', $post->user->id) }}">{{$post->user->fname . ' ' . $post->user->sname}}</a></h5>
                    @endif


                <span class="time">{{$post->created_at->diffForHumans()}}</span>
                <br/>
                @if($post->category->name == 'Code')
                	<span>{!! $post->message !!}</span>
                	 <pre style="display: inline-grid;" class="prettyprint col-md-12">
                    <code>{{ $post->code }}</code>
                    </pre>
                    
                @else
                	<span>{!! $post->message !!}</span> 
                @endif
                <br>
                <span class="label label-info">
                    {{$post->comments->count() > 1 ? $post->comments->count() . ' Comments': $post->comments->count() . ' Comment'}} </span>
                <span class="label label-primary" id="postLikeCount">{{$post->likes()->count()}}</span>
                {{--Make the heart red when the post is liked--}}
                <button class="btn {{$post->likes()->where('user_id', auth()->user()->id)->where('likable_id', $post->id)->first() ? 'btn-danger': 'btn-success' }} btn-rounded btn-outline btn-xs" onclick="toggleLikePost({{$post->id}}, this)"><i class="fa fa-heart"></i></button>
                
                    @if (auth()->user()->id == $post->user->id)
                        <a href="{{route('post.edit', $post->id)}}" class="btn btn btn-rounded btn-info btn-sm btn-outline"><i class="ti-check text-success"></i>Edit Post</a>
                    @endif
                
            </div>
        </div>                               
    </div>
    
</div>
</section>
{{--Comment title--}}
<div class="row">
    <div class="col-sm-6 col-sm-offset-4">
       <h3 style="color: orange;"><\Comments></h3>
    </div>
</div>

{{--comments--}}
<div class="white-box">
    @if (count($post->comments) > 0)
        @foreach ($post->comments()->orderBy('created_at')->get() as $comment)

           <div class="comment-center ">
                {{-- <div class="comment-body"> --}}
                    <div class="user-img">
                    @if(Storage::disk('local')->has('public/profile/'.$comment->user->image))
                            <img src="{{ route('userimage',['filename' => $comment->user->image]) }}" alt="Circle Image" class="img-circle"  >    
                         @endif
                    </div>
                    <div class="mail-contnet">
                        
                        @if (auth()->user()->id == $comment->user->id)
                            <h5><a href="{{route('profile', $comment->user->id) }}">me</a></h5>
                        @else
                            <h5><a href="{{route('profile', $comment->user->id) }}">{{$comment->user->fname . ' ' . $comment->user->sname}}</a></h5>
                        @endif

                        <span class="time">{{$comment->created_at->diffForHumans()}}</span>
                        <br/>
                         @if ($comment->approved == 1)
                            <i class="fa fa-check text-success fa-2x" title="Marked as Correct"></i><br>
                         @endif
                        
                        <span>{!! $comment->message !!}</span> 
                        @if ($comment->message_type = 2)
                         @isset ($comment->code)
                            <pre style="display: inline-grid;" class="prettyprint col-md-12" style="">                               
                                <code>{{ $comment->code }}</code>                               
                            </pre>
                        @endisset
                               
                        @endif

                       
                   
                        <span class="label label-info">
                            {{ count($comment->reply) > 1 ? $comment->reply()->count() . ' replies' : $comment->reply()->count() .' reply'}} 
                        </span>
                        <span class="label label-primary" id="commentLikeCount{{$comment->id}}">{{$comment->likes()->count()}}</span>
                        {{--Make the heart red when the post is liked--}}
                <button class="btn {{$comment->likes()->where('user_id', auth()->user()->id)->where('likable_id', $comment->id)->first() ? 'btn-danger': 'btn-success' }}  btn-rounded btn-outline btn-xs" onclick="toggleLikeComment({{$comment->id}}, this)"><i class="fa fa-heart"></i></button>
                        <button  class="btn btn btn-rounded btn-success btn-sm btn-outline" onclick="toggleReplyForm({{$comment->id}})"><i class="ti-check text-success"></i>Reply</button>

                        {{--reply form--}}
                        <div id="replyForm{{$comment->id}}" class="replyForm">
                        <form action="{{ route('commentreply.store', $comment->id) }}" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group {{$errors->has('categoryOfReply') ? 'has-error': ''}}">
                                <label class="col-sm-12">Type of Reply</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="categoryOfReply" required>
                                        <option value="" disabled selected>Select Type of Reply</option>
                                            <option value="1">Message Only</option>
                                            <option value="2">Message with Code</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group label-floating {{$errors->has('message') ? 'has-error' : '' }}">
                                        <label class="col-md-12">Message</label>
                                        <div class="col-md-12">
                                            <textarea rows="8" class="form-control form-control-line textarea" name="message" >{{ old('message') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row" id="codeDiv">
                        <div class="col-sm-12">
                            <div class="form-group label-floating {{$errors->has('code') ? 'has-error' : '' }}">
                                <label class="col-md-12">Code</label>
                                <div class="col-md-12">
                                    <textarea rows="2" class="form-control form-control-line" name="code" >{{ old('code') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>     
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Submit Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                        </div>
                        {{--ends reply form--}} 
                       
                    </div>
                    {{-- </div>                                --}}
            </div>
                    {{--display replies to the comments--}}
                    <div class="container-fluid" style="margin-left: 40px; margin-top: 30px;"> 
                        @foreach ($comment->reply as $replies)
                            <div class="comment-center">
                                {{-- <div class="comment-body col-md-"> --}}
                                    <div class="user-img" >
                                    @if(Storage::disk('local')->has('public/profile/'.$replies->user->image))
                                        <img src="{{ route('userimage',['filename' => $replies->user->image]) }}" alt="Circle Image" class="img-circle "  >    
                                     @endif
                                    </div>
                                    <div class="mail-contnet" style="">

                                     @if (auth()->user()->id == $replies->user->id)
                                        <h5><a href="{{route('profile', $replies->user->id) }}">me</a></h5>
                                    @else
                                        <h5><a href="{{route('profile', $replies->user->id) }}">{{$replies->user->fname . ' ' . $replies->user->sname}}</a></h5>
                                    @endif


                                        <span class="time">{{$replies->created_at->diffForHumans()}}</span>
                                        <br/>
                                         @if ($replies->approved == 1)
                                             <i class="fa fa-check text-success fa-2x" title="Marked as Correct"></i><br>
                                        @endif
                                         
                                            <span>{!! $replies->message !!}</span> 

                                            @if ($replies->message_type = 2)
                                            @isset ($replies->code)
                                                 <pre style="display: inline-grid; word-break: break-all;" class="prettyprint col-md-12 col-xs-6">
                                                    <code>{{ $replies->code }}</code>
                                                </pre>
                                            
                                            @endisset
                                               
                                            @endif
                                        <br>
                                        
                                    </div>
                                {{-- </div>                                --}}
                             </div>
                        @endforeach
                    </div>
                    {{--end replies--}}
                

        @endforeach
    @else
        <div class="row">
                <div class="comment-center ">
                    <div class="comment-body">
                        <div class="col-sm-6 col-sm-offset-4">
                            <h4 style="color: gray;">There are no comments</h4>
                        </div>
                    </div>
                </div>
        </div>
    @endif

</div>
    

    {{--Comment Form--}}
<div class="row">
            <div class="col-sm-6 col-sm-offset-1">
                <h3 style="color: gray;">Write your comments here...</h3>
            </div>
        </div>
<form action="{{ route('postcomment.store', $post->id) }}" method="POST">
            {{csrf_field()}}
      
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group {{$errors->has('categoryOfComment') ? 'has-error': ''}}">
                <label class="col-sm-12">Type of Comment</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-line" name="categoryOfComment" required>
                        <option value="" disabled selected>Select Type of Comment</option>
                            <option value="1">Message Only</option>
                            <option value="2">Message with Code</option>
                    </select>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group label-floating {{$errors->has('message') ? 'has-error' : '' }}">
                <label class="col-md-12">Message</label>
                <div class="col-md-12">
                    <textarea rows="8" class="form-control form-control-line textarea" name="message" >{{ old('message') }}</textarea>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row" id="codeDiv">
        <div class="col-sm-12">
            <div class="form-group label-floating {{$errors->has('code') ? 'has-error' : '' }}">
                <label class="col-md-12">Code</label>
                <div class="col-md-12">
                    <textarea rows="2" class="form-control form-control-line" name="code" required>{{ old('code') }}</textarea>
                </div>
            </div>
        </div>
    </div>   
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-info" type="submit">Submit Comment</button>
                </div>
            </div>
        </div>
    </div>
</form>	                                 

@stop
