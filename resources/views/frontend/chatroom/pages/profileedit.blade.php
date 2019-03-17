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
	                            @if(Storage::disk('local')->has('public/profile/'.auth()->user()->image))
            				<img src="{{ route('userimage',['filename' => auth()->user()->image]) }}" alt="Circle Image" class="img-circle img-responsive img-raised"  >    
          				 @endif
	                        </div>
	                        <div class="name">
	                            <h3 class="title">{{ auth()->user()->fname." ".auth()->user()->sname }}</h3>
	                        </div>
	                    </div>
	                </div>
	                <div class="description text-center">
                        <h5>Welcome... you can update your profle here. Set up your personal account image, personal information and authentication credentials. Please do well to provide all information. Thank you!! </h5>
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
											<a href="#personalinfo" role="tab" data-toggle="tab">
												<i class="fa fa-user fa-2x"></i>
												Personal Info
											</a>
										</li>
										<li>
				                            <a href="#credentials" role="tab" data-toggle="tab">											
												<i class="fa fa-lock fa-2x"></i>
												Credentials
				                            </a>
				                        </li>
				                        <li>
				                            <a href="#profileimage" role="tab" data-toggle="tab">
												<i class="fa fa-user-plus fa-2x"></i>
				                                Profile Image
				                            </a>
				                        </li>
				                    </ul>

				                    <div class="tab-content gallery">
										<div class="tab-pane active" id="personalinfo">
				                            <div class="row">
												
				                            	@include('frontend.chatroom.partials.form._profileinfoform')
				                            </div>
				                        </div>
				                        <div class="tab-pane text-center" id="credentials">
											<div class="row">
											@include('frontend.chatroom.partials.form._profileauthform')
												
											</div>
				                        </div>
										<div class="tab-pane " id="profileimage">
											<div class="row">
												
												@include('frontend.chatroom.partials.form._profilepicform')	
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