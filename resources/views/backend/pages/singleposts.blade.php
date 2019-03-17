@extends('backend.layout.master')
@section('title', 'Platform Single Post')
@section('styles')
<style type="text/css">
		.label {
			font-size: 12px !important;
			padding: 6px !important;
			margin-left: 5px;
		}
	</style>
@endsection
@section('content')

 <!-- ============================================================== -->
                <!-- Users Listing -->
                <!-- ============================================================== -->
<div class="row">
    <div class="col-lg-9 col-md-9 col-xs-12">
        <div class="white-box">
        	<h3 class="box-title" style="font-size: 1.5em; color: orange;"><\{{$post->category->name }}></h3>
   	
    
    <div class="comment-center p-t-10">
        <div class="comment-body" >
            <div class="user-img"> 
                @if(Storage::disk('local')->has('public/profile/'.$post->user->image))
                            <img src="{{ route('userimage',['filename' => $post->user->image]) }}" alt="Circle Image" class="img-circle"  >    
                @endif
            </div>
            <div class="mail-contnet" style="display: inline-table;">
            	<h2 class="post-title rm-mg-10">{{$post->title}}</h2>

               
             <h5><a href="{{route('plartformuserprofile', $post->user->id) }}">{{$post->user->fname . ' ' . $post->user->sname}}</a></h5>
                    


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
                <span class="label label-primary" >{{$post->likes()->count()}}</span>
               

                <a href="{{route('adminposts.approve', $post->id)}}" class="btn btn btn-rounded btn-default btn-outline m-r-5" style="margin-left: 5px;"><i class="ti-check text-success m-r-5"></i>Approve</a><a href="{{route('adminposts.disapprove', $post->id)}}" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i> Reject</a>
                    
                
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
                        
                       
                     <h5><a href="{{route('plartformuserprofile', $comment->user->id) }}">{{$comment->user->fname . ' ' . $comment->user->sname}}</a></h5>
                    

                        <span class="time">{{$comment->created_at->diffForHumans()}}</span>
                        <br/>

                        @if ($comment->approved == 1)
                            <i class="fa fa-check text-success fa-2x"></i><br>
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
                        <span class="label label-primary">{{$comment->likes()->count()}}</span>

                        <a href="{{route('admincomments.approve', $comment->id)}}" class="btn btn btn-rounded btn-default btn-outline m-r-5" style="margin-left: 5px;"><i class="ti-check text-success m-r-5"></i>Approve</a><a href="{{route('admincomments.disapprove', $comment->id)}}" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i> Reject</a>
                      
               
                       
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
                                    <div class="mail-contnet" style="display: inline-table;">

                                     
                                        <h5><a href="{{route('plartformuserprofile', $replies->user->id) }}">{{$replies->user->fname . ' ' . $replies->user->sname}}</a></h5>
                                    


                                        <span class="time">{{$replies->created_at->diffForHumans()}}</span>
                                        <br/>
                                        @if ($replies->approved == 1)
                                            <i class="fa fa-check text-success fa-2x"></i><br>
                                         @endif
                                         
                                            <span>{!! $replies->message !!}</span> 

                                            @if ($replies->message_type = 2)
                                            @isset ($replies->code)
                                                 <pre style="display: inline-grid;" class="prettyprint col-md-12 col-xs-7">
                                                    <code>{{ $replies->code }}</code>
                                                </pre>
                                            
                                            @endisset
                                               
                                            @endif
                                        <br>

                                        <a href="{{route('admincomments.approve', $replies->id)}}" class="btn btn btn-rounded btn-default btn-outline m-r-5" style="margin-left: 5px;"><i class="ti-check text-success m-r-5"></i>Approve</a><a href="{{route('admincomments.disapprove', $replies->id)}}" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i> Reject</a>
                                        
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
    </div>
    {{--Filter Buttons--}}
    <div class="col-lg-3 col-md-3 col-sm-12">
		                   

		<h4 style="color: gray;">Filter By Post Type</h4>
		<ul class="list-group">
		  <a href="{{route('adminposts.pending')}}"><li class="list-group-item">
		    <span class="badge">{{$public_data['disapproved']}}</span>
		    Pending Posts
		  </li>
		</a>
		<a href="{{route('adminposts.index') }}"><li class="list-group-item">
		    <span class="badge">{{$public_data['posts']}}</span>
		   All Posts
		  </li>
		</a>
		<a href="{{route('adminposts.get', ['description' => 'codes'])}}"><li class="list-group-item">
		    <span class="badge">{{$public_data['codes']}}</span>
		   Codes
		  </li>
		</a>
		<a href="{{route('adminposts.get', ['description' => 'questions'])}}"><li class="list-group-item">
		    <span class="badge">{{$public_data['questions']}}</span>
		   Questions
		  </li>
		</a>
		<a href="{{route('adminposts.get', ['description' => 'publications'])}}"><li class="list-group-item">
		    <span class="badge">{{$public_data['publications']}}</span>
		    Publications
		  </li>
		</a>
		</ul>

		

    </div>
                    
                    <!-- /.col -->
</div>

@stop

