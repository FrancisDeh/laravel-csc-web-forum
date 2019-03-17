@extends('frontend.chatroom.layout.master')
@section('page_title', 'Chatroom')

@section('body_class', 'profile-page')
@section('styles')
	@include('frontend.chatroom.partials.styles._chatroom')
@endsection
@section('wrapper')
<div class="wrapper">
	<div class="visible-lg visible-md" style="margin-top: 60px;"></div>
	<div class="visible-xs" style="margin-top: 130px;"></div>
	<div class="main main-raised" style="padding-bottom: 30px;">
		
		<div class="container">

			<div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8">
                    	@yield('content')
               		</div>
                {{-- end of column --}}
			
				
					<div class="col-sm-12 col-md-4 col-lg-4 mg-top-20">
						{{--search button--}}
                    	<form method="post" action="{{route('searchpostrequest') }}">
                    		{{csrf_field()}}
                    		<div class="row">
                    			<div class="col-sm-10">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-search"></i>
										</span>
										<input type="text" class="form-control" placeholder="search using title.." id="searchPost" name="searchTerm" />
									</div>
								</div>
                    		</div>					
                    	</form>
						<section>
							<div class="visible-md visible-lg">
								<a href="{{route('post.index')}}" class="btn btn btn-rounded btn-info btn btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Create a Post</a>
								<a href="{{route('file.create')}}" class="btn btn btn-rounded btn-info btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Upload a File</a></div>
							<div class="visible-xs visible-sm">
								<a href="{{route('post.index')}}" class="btn btn btn-rounded btn-info btn-xs btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Create a Post</a>
								<a href="{{route('file.create')}}" class="btn btn btn-rounded btn-info btn-xs btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Upload a File</a>
							</div>
							
						</section>

						<section class="category-section">
                        	<div class="panel panel-info">
							  <div class="panel-heading">
							    Choose Category
							  </div>
							  <div class="panel-body">
							    <ul class="list-group">
								  <a href="{{route('posts') }}"> <li class="list-group-item"><span class="badge">{{ $public_data['posts']}} </span> All Posts</li></a>
								  <a href="{{route('get-posts', ['description' => 'questions']) }}"> <li class="list-group-item"><span class="badge">{{ $public_data['questions']}}</span> Question</li></a>
								  <a href="{{route('get-posts', ['description' => 'codes']) }}"> <li class="list-group-item"><span class="badge">{{ $public_data['codes']}}</span> Code</li></a>
								  <a href="{{route('get-posts', ['description' => 'publications']) }}"> <li class="list-group-item"><span class="badge">{{ $public_data['publications']}}</span> Publication</li></a>
								  
								  
								</ul>
							  </div>
							</div>
					
						</section>

						{{-- <section class="filter-section">
                     		<div class="panel panel-primary">
							  <div class="panel-heading">Choose a Filter</div>
							  <div class="panel-body">
							    <ul class="list-group">
								  <li class="list-group-item"><span class="badge">14</span>All Posts</li>
								  <li class="list-group-item"><span class="badge">14</span>Popular</li>
								  <li class="list-group-item"><span class="badge">14</span>Solved</li>
								  <li class="list-group-item"><span class="badge">14</span>Unsolved</li>
								  <li class="list-group-item"><span class="badge">14</span>No replies</li>
								  
								</ul>
							  </div>
							</div>

							
                        </section>
                         --}}


                	</div>
                {{-- end of column --}}
				

				

{{--inlcude events carousel--}}
@include('frontend.chatroom.partials.carousel._eventscarousel')	
				
</div>
			{{-- end of row --}}
</div>
	{{-- end of container --}}
	
</div>
@include('frontend.getting_started.partials._footer')
</div>
@endsection