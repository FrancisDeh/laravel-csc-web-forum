@extends('backend.layout.master')
@section('title', 'Platform Users')

@section('content')

 <!-- ============================================================== -->
                <!-- Users Listing -->
                <!-- ============================================================== -->
<div class="row">
                    <!-- .col -->
    <div class="col-md-12 col-lg-8 col-sm-12">
                        

    <div class="white-box">
        <h3 class="box-title" style="font-size: 1.5em;">
            @if (Request::is('admin-display-platform-users'))
                <span style="color: orange;"><\All Users></span>
            
            @else
                @isset ($message)
                    <span style="color: orange;">{{$message}}</span>
                @endisset
              
            @endif
       
          
            {{--This should display the count for all categories--}}
             <span style="color: orange;">({{$users->count()}})</span>
          
        </h3>
        @if (count($users) > 0)
       
        @foreach ($users as $user)
        	
        
        <div class="comment-center p-t-10">
            <div class="comment-body">
                <div class="user-img"> 
                    @if(Storage::disk('local')->has('public/profile/'.$user->image))
                            <img src="{{ route('userimage',['filename' => $user->image]) }}" alt="Circle Image" class="img-circle"  >    
                         @endif
                </div>
                <div class="mail-contnet">
       
                         <h2 class="post-title rm-mg-10"><a href="{{route('plartformuserprofile', $user->id) }}">{{$user->fname . ' ' . $user->sname}}</a></h2>
                   
                                      
                        <h5>
                        @isset ($user->programme->name)
                            {{$user->programme->name . ' ' }} ({{$user->level}})
                        @else
                            Not Set
                        @endisset
                            
                        </h5>

                    <span class="time" style="font-weight: bold;">
                        Joined {{$user->created_at->diffForHumans()}}
                        @if ($user->online_status == 1)
                            <span style="color: green; font-weight: bold;">...online</span>
                        @endif
                    </span>
                    <br/><span class="mail-desc">{{ strlen(strip_tags($user->bio)) > 500 ? str_limit(strip_tags($user->bio), $limit = 500, $end = '...') : strip_tags($user->bio) }}</span> 

                    @foreach ($user->language as $language)
						<span class="label label-info">
                      		 {{$language->name}}
                    	</span>	
					@endforeach
                   
                </div>
            </div>                               
        </div>
        @endforeach
        @else
            <div class="row">
                <div class="comment-center ">
                    <div class="comment-body">
                        <div class="col-sm-6 col-sm-offset-4">
                            <h4 style="color: gray;">There are no Users!</h4>
                        </div>
                    </div>
                </div>
        </div>
        @endif
    </div> 
    </div>
    {{--Filter Buttons--}}
    <div class="col-lg-4 col-md-6 col-sm-12">
		                    	<!-- Single button -->
		<h4 style="color: gray;">Filter by Programme</h4>
		<ul class="list-group">
			@foreach ($public_data['programmes'] as $programme)
				<a href="{{route('platform-users-by-programme', ['name' => $programme->name, 'id' => $programme->id]) }}">
					<li class="list-group-item">
		    		<span class="badge">{{$public_data['users']->where('programme_id', $programme->id)->count()}}</span>
		    		{{$programme->name}}
		  			</li>
		  		</a>
			@endforeach
		</ul>

		<h4 style="color: gray;">Filter By Level</h4>
		<ul class="list-group">
		  <a href="{{ route('platform-users-by-level', ['level' => 100]) }}"><li class="list-group-item">
		    <span class="badge">{{$public_data['users']->where('level', 100)->count()}}</span>
		    100
		  </li>
		</a>
		<a href="{{ route('platform-users-by-level', ['level' => 200]) }}"><li class="list-group-item">
		    <span class="badge">{{$public_data['users']->where('level', 200)->count()}}</span>
		   200
		  </li>
		</a>
		<a href="{{ route('platform-users-by-level', ['level' => 300]) }}"><li class="list-group-item">
		    <span class="badge">{{$public_data['users']->where('level', 300)->count()}}</span>
		   300
		  </li>
		</a>
		<a href="{{ route('platform-users-by-level', ['level' => 400]) }}"><li class="list-group-item">
		    <span class="badge">{{$public_data['users']->where('level', 400)->count()}}</span>
		    400
		  </li>
		</a>
		</ul>

		<h4 style="color: gray;">Filter By Gender</h4>
		<ul class="list-group">
		  <a href="{{ route('platform-users-by-gender', ['gender' => 'm']) }}"><li class="list-group-item">
		    <span class="badge">{{$public_data['users']->where('gender', 'M')->count()}}</span>
		    Males
		  </li>
		</a>
		<a href="{{ route('platform-users-by-gender', ['gender' => 'f']) }}"><li class="list-group-item">
		    <span class="badge">{{$public_data['users']->where('gender', 'F')->count()}}</span>
		    Females
		  </li>
		</a>
		</ul>

		<h4 style="color: gray;">Filter By Programming Language</h4>
		<ul class="list-group">
		@foreach ($public_data['languages'] as $language)
			<a href="{{route('platform-users-by-language', ['name' => $language->name, 'id' => $language->id ]) }}"><li class="list-group-item">
		    <span class="badge">{{$language->user->count()}}</span>
		    {{$language->name}}
		  </li>
		@endforeach
		  
		</ul>

    </div>
                    
                    <!-- /.col -->
</div>

@stop