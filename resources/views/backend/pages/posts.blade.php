@extends('backend.layout.master')
@section('title', 'Platform Posts')

@section('content')

 <!-- ============================================================== -->
                <!-- Users Listing -->
                <!-- ============================================================== -->
<div class="row">
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            
                           
        <h4 style="color: gray;">
        	@isset ($message)
        	  {{ $message}}
        	 @else
        	  Posts 

        	@endisset
        	

        ({{count($posts) }})
    </h4>
        @if(count($posts) > 0)
          <div class="table-responsive">
               <table class="table table-hover">
                    <thead>
                        <tr>
                           
                            <th>Title</th>
                            <th>Author</th>
                            <th><i class="fa fa-comment-o"></i></th>
                            <th><i class="fa fa-heart"></i></th>
                            <th>Published</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td style="text-align: left;"> <a href="{{route('adminposts.single',$post->id ) }}">{{ $post->title }}</td>
                            <td style="text-align: left;">{{$post->user->fname . ' ' .$post->user->sname }} </td>
                             <td style="text-align: left;">{{$post->comments()->count() }}</td>
                            <td style="text-align: left;">{{$post->likes()->count() }}</td>
                            <td style="text-align: left;">{{$post->created_at->diffForHumans() }}</td>        
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            </div>
        @else
            <p>There are no Posts Available</p>
        @endif      

        </div>
    </div>
    {{--Filter Buttons--}}
    <div class="col-lg-4 col-md-6 col-sm-12">
		                   

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
