@extends('frontend.chatroom.pages.main')

@section('content')

<section class="post-section">
    <div class="white-box">
        <h3 class="box-title" style="font-size: 1.5em;">
            @if(Request::is('posts'))
                <span style="color: orange;"><\Recent Posts></span>
            @elseif (Request::is('searchpostrequest'))
                <span style="color: orange;"><\Search Results> ({{$posts->count() }})</span>
            @else
                @if(Route::current('get-posts'))
                    <span style="color: orange;"><\{{ Route::current()->description}}></span>
                     
                @endif
            @endif
       
        </h3>
        @if (count($posts) > 0)
       
        @foreach ($posts as $post)
        	
        
        <div class="comment-center p-t-10">
            <div class="comment-body">
                <div class="user-img"> 
                    @if(Storage::disk('local')->has('public/profile/'.$post->user->image))
                            <img src="{{ route('userimage',['filename' => $post->user->image]) }}" alt="Circle Image" class="img-circle"  >    
                         @endif
                </div>
                <div class="mail-contnet">
                	<h2 class="post-title rm-mg-10"><a href="{{route('post.show', $post->id) }}"> {{$post->title }}</a></h2>

                    @if (auth()->user()->id == $post->user->id)
                        <h5><a href="{{route('profile', $post->user->id) }}">me</a></h5>
                    @else
                         <h5><a href="{{route('profile', $post->user->id) }}">{{$post->user->fname . ' ' . $post->user->sname}}</a></h5>
                    @endif
                   


                    <span class="time">{{$post->created_at->diffForHumans()}}</span>
                    <br/><span class="mail-desc">{{ strlen(strip_tags($post->message)) > 500 ? str_limit(strip_tags($post->message), $limit = 500, $end = '...') : strip_tags($post->message) }}</span> 

                    <span class="label label-info">
                        {{$post->comments->count() > 1 ? $post->comments->count() . ' Comments': $post->comments->count() . ' Comment'}}
                    </span>
                    <span class="label label-primary">
                          {{$post->likes->count() > 1 ? $post->likes->count() . ' likes': $post->likes->count() . ' like'}}
                    </span>
                </div>
            </div>                               
        </div>
        @endforeach
        @else
            <div class="row">
                <div class="comment-center ">
                    <div class="comment-body">
                        <div class="col-sm-6 col-sm-offset-4">
                            <h4 style="color: gray;">There are no Posts!</h4>
                        </div>
                    </div>
                </div>
        </div>
        @endif
    </div>
</section>
    
@endsection