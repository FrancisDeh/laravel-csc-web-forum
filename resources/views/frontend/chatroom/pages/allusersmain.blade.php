@extends('frontend.chatroom.layout.master')
@section('page_title', 'All Users')

@section('body_class', 'profile-page')
@section('styles')
<style type="text/css">
	.repository-tr-padding-2> td  {
		padding-bottom: 2px !important;
	}

	.minus-10{
		padding-top: 2px !important;
	}
</style>
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
                    	<form method="post" action="{{route('searchuserrequest') }}">
                    		{{csrf_field()}}
                    		<div class="row">
                    			<div class="col-sm-10">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-search"></i>
										</span>
										<input type="text" class="form-control" placeholder="search using name.." id="searchUser" name="searchTerm" />
									</div>
								</div>
                    		</div>					
                    	</form>

						<section>
							<div class="visible-md visible-lg">
								<a href="{{route('post.index')}}" class="btn btn btn-rounded btn-info btn btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Create a Post</a>
								<a href="{{ route('file.create') }}" class="btn btn btn-rounded btn-info btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Upload a File</a></div>
							<div class="visible-xs visible-sm">
								<a href="{{route('post.index')}}" class="btn btn btn-rounded btn-info btn-xs btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Create a Post</a>
								<a href="{{route('file.create')}}" class="btn btn btn-rounded btn-info btn-xs btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Upload a File</a>
							</div>
							
						</section>

						<section class="category-section mg-top-40">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-primary">
							    <div class="panel-heading" role="tab" id="headingOne">
							      <h4 class="panel-title">
							        <a role="button" class="collapsed text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							          View By Programme
							        </a>
							      </h4>
							    </div>
							    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							      <div class="panel-body">
							        <ul class="list-group">
							        	{{--loop for programmes--}}
			
							       		<a href="{{ route('alluserspage') }}" class="btn btn-block btn-outline btn-info">All</a>

							        	@foreach ($public_data['programmes'] as $programme)
							        		<a href="{{route('get-users-by-programme', ['name' => $programme->name, 'id' => $programme->id]) }}" class="btn btn-block btn-outline btn-info">{{$programme->name }}</a>
							        	@endforeach
							       							       	
							       	</ul>
							      </div>
							    </div>
							  </div>
							  <div class="panel panel-primary">
							    <div class="panel-heading" role="tab" id="headingTwo">
							      <h4 class="panel-title">
							        <a class="collapsed text-center" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							          View By Level
							        </a>
							      </h4>
							    </div>
							    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							      <div class="panel-body">
							       	<ul class="list-group">
							       		<a href="{{ route('get-users-by-level', ['level' => 100]) }}" class="btn btn-block btn-outline btn-info">Level 100</a>
							       		<a href="{{ route('get-users-by-level', ['level' => 200]) }}" class="btn btn-block btn-outline btn-info">Level 200</a>
							       		<a href="{{ route('get-users-by-level', ['level' => 300]) }}" class="btn btn-block btn-outline btn-info">Level 300</a>
							       		<a href="{{ route('get-users-by-level', ['level' => 400]) }}" class="btn btn-block btn-outline btn-info">Level 400</a>					       	
							       	</ul>
							      </div>
							    </div>
							  </div>
							  <div class="panel panel-primary">
							    <div class="panel-heading" role="tab" id="headingThree">
							      <h4 class="panel-title">
							        <a class="collapsed text-center" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							          View By Gender
							        </a>
							      </h4>
							    </div>
							    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							      <div class="panel-body">
							        <ul class="list-group">
							       		<a href="{{ route('get-users-by-gender', ['gender' => 'f']) }}" class="btn btn-block btn-outline btn-info">Females</a>
							       		<a href="{{ route('get-users-by-gender', ['gender' => 'm']) }}" class="btn btn-block btn-outline btn-info">Males</a>
							       		
							       	</ul>
							      </div>
							    </div>
							  </div>
							</div>
					
						</section>

						<section class="filter-section mg-top-40">
                     		<div class="panel panel-primary">
							  <div class="panel-heading">Choose a Filter</div>
							  <div class="panel-body">
							    <ul class="list-group">
							    	{{--load programming languages--}}
							    	@foreach ($public_data['languages'] as $language)
							    		<a href="{{route('get-users-by-language', ['name' => $language->name, 'id' => $language->id ]) }}"><li class="list-group-item"><span class="badge">{{$language->user->count()}}</span>{{$language->name }}</li>
							    		</a>
							    	@endforeach
								  
							    	
								 
								</ul>
							  </div>
							</div>

							
                        </section>
                        


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
