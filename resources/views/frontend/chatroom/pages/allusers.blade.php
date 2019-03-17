@extends('frontend.chatroom.pages.allusersmain')
@section('content')
	<section class="page-content-section">                                    
 
    <div class="white-box">
        <h3 class="box-title" style="font-size: 1.5em;">
            @if (Request::is('all-users'))
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
                	@if (auth()->user()->id == $user->id)
                        <h2 class="post-title rm-mg-10"><a href="{{route('profile', auth()->user()->id) }}">me</a></h2>
                    @else
                         <h2 class="post-title rm-mg-10"><a href="{{route('profile', $user->id) }}">{{$user->fname . ' ' . $user->sname}}</a></h2>
                    @endif
                                      
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
											
    </section>
@endsection