@extends('frontend.getting_started.layout.master')
@section('page_title', 'Welcome')

@section('body_class', 'landing-page')
@section('wrapper')
    <div class="wrapper">

    		    

        <div class="header header-filter" id="landingHero" style="background-image: url('images/landing1.jpg');">
            <div class="container">
                <div class="row">
					<div class="col-md-6" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 10px;">
						<h1 class="title">The Solutions lie here</h1>
	                    <h4></h4>
	                    <br />
	             
					</div>
                </div>
            </div>
        </div>

		<div class="main main-raised">
			<div class="container">
		    	<div class="section text-center section-landing">
	                <div class="row">
	                    <div class="col-md-8 col-md-offset-2">
	                        <h2 class="title">What this site offers</h2>
	                        {{-- <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user to see more.</h5> --}}
	                    </div>
	                </div>

					<div class="features">
						<div class="row">
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-primary">
										<i class="material-icons">forum</i>
									</div>
									<h4 class="info-title">Ask & Answer Questions</h4>
									{{-- <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p> --}}
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-success">
										<i class="material-icons">group_code</i>
									</div>
									<h4 class="info-title">Meet Colleague Programmers</h4>
									{{-- <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p> --}}
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-danger">
										<i class="material-icons">help</i>
									</div>
									<h4 class="info-title">Get Help from Colleagues</h4>
									{{-- <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p> --}}
								</div>
		                    </div>

		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-primary">
										<i class="material-icons">event</i>
									</div>
									<h4 class="info-title">Create and Browse Events</h4>
									{{-- <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p> --}}
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-success">
										<i class="material-icons">cloud_download cloud_upload</i>
									</div>
									<h4 class="info-title">Upload and Download Course Materials</h4>
									{{-- <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p> --}}
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-danger">
										<i class="material-icons">book</i>
									</div>
									<h4 class="info-title">Write Articles</h4>
									{{-- <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p> --}}
								</div>
		                    </div>
		                </div>
					</div>
	            </div>


	        	<div class="section text-center">
	                <h2 class="title">Here is our team</h2>

					<div class="team">
						<div class="row">
							@foreach ($developers as $developer)				
								<div class="col-md-3">
				                    <div class="team-player">
				                    	 @if(Storage::disk('local')->has('public/devprofile/'.$developer->image))
				                            <img src="{{ route('devimage',['filename' => $developer->image]) }}" alt="Thumbnail Image" class="img-raised img-circle">    
				                         @endif
				                     
				                        <h4 class="title">{{ $developer->fname.' '.$developer->sname }} <br/>
											<small class="text-muted">{{ $developer->work_field }}</small>
										</h4>
				                        <p class="description">{{ $developer->description }}</p>
				                        <a href="{{ $developer->fbhandle }}" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a>
										<a href="{{ $developer->twitterhandle }}" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
										<a href="{{ $developer->gplushandle }}" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-google-plus"></i></a>
										@isset ($developer->instagramhandle)
										    <a href="{{ $developer->instagramhandle }}" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>
										@endisset
										@isset ($developer->linkedinhandle)
										    <a href="{{ $developer->linkedinhandle }}" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-linkedin"></i></a>
										@endisset
										
										
				                    </div>
								</div>
							@endforeach
			            </div>
			        </div>



	        </div>

		
	    </div>
	    @include('frontend.getting_started.partials._footer')


	</div>
@endsection