@extends('frontend.chatroom.layout.master')
@section('page_title', 'Edit Profile')

@section('body_class', 'profile-page')
@section('wrapper')
    <div class="wrapper">
		<div class="header header-filter" style="background-image: url({{ url('images/landing2.jpg') }});"></div>

		<div class="main main-raised">
			<div class="profile-content">
	            <div class="container">
	                <div class="row">
	                    <div class="profile">
	                        <div class="avatar">
						  @if(Storage::disk('local')->has('public/profile/'.$user->image))
            				<img src="{{ route('userimage',['filename' => $user->image]) }}" alt="Circle Image" class="img-circle img-responsive img-raised"  >    
          				 @endif
	                        </div>
	                        <div class="name">
	                            <h3 class="title">{{ $user->fname." ".$user->sname }}</h3>
								<h6>
									@foreach ($user->language as $language)
										<span class="label label-info">
                      		 				{{$language->name}}
                    					</span>
									@endforeach
								</h6>
	                        </div>
	                    </div>
	                </div>
	                <div class="description text-center">
                        <h5>{!! $user->bio !!}</h5>
	                </div>
	                 {{--Errors and sessions--}}
	                <div class="container">
	                	<div class="row">
	                		<div class="col-md-6 col-md-offset-3">
	                		@include('frontend.chatroom.partials.session._errormessage')
	                		@include('frontend.chatroom.partials.session._successmessage')
	                		</div>
	                		
	                	</div>
	                </div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="profile-tabs">
			                    <div class="nav-align-center">
									<ul class="nav nav-pills" role="tablist">
										<li class="active">
											<a href="#profile" role="tab" data-toggle="tab">
												
												<i class="fa fa-user fa-2x"></i>
												Profile
											</a>
										</li>
										<li>
				                            <a href="#reactions" role="tab" data-toggle="tab">
												
												<i class="fa fa-comment-o fa-2x"></i>
												Reactions
				                            </a>
				                        </li>
				                        <li>
				                            <a href="#posts" role="tab" data-toggle="tab">
												
												<i class="fa fa-pencil fa-2x"></i>
				                                Posts
				                            </a>
				                        </li>
				                    </ul>

				                    <div class="tab-content gallery">
										<div class="tab-pane active" id="profile">
				                            <div class="row">
												{{--include the reactions partials here--}}
												@include('frontend.chatroom.partials.postcards._profilecard')
												
				                            </div>
				                        </div>
				                        <div class="tab-pane text-center" id="reactions">
											<div class="row">
												{{--include the reactions partials here--}}
												@include('frontend.chatroom.partials.postcards._reactionscard')
												
											</div>
				                        </div>
										<div class="tab-pane " id="posts">
											<div class="row">
												
													{{--include the posts partials here--}}
												@include('frontend.chatroom.partials.postcards._postcards')
											</div>
				                        </div>

				                    </div>
								</div>
							</div>
							<!-- End Profile Tabs -->
						</div>
	                </div>

	            </div>
	        </div>
		</div>

    </div>
  
	    @include('frontend.getting_started.partials._footer')


	</div>
@endsection