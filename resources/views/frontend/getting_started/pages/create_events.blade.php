@extends('frontend.getting_started.layout.master-event')
@section('page_title', 'Signup')

@section('body_class', 'signup-page')
@section('wrapper')
	

	    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('images/landing2.jpg'); background-size: cover; background-position: top center;">
			
			<div class="container">
				<div class="row">
					@include('frontend.chatroom.partials.session._errormessage')
					@include('frontend.chatroom.partials.session._successmessage')
					
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup" style=" margin-bottom: 35px; margin-right: 250px;" >
							<form class="form" method="post" action="{{ route('event.store') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="header header-primary text-center">
									<h4>Create Event</h4>
									
								</div>
								
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-tag"></i>
										</span>
										<input type="text" name="eventTitle" class="form-control" placeholder="Event Title ..." value="{{ old('eventTitle') }}">
										@if ($errors->has('eventTitle'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('eventTitle') }}</strong>
		                                    </span>
		                                @endif
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-pencil-square-o"></i>
										</span>
										<textarea rows="2" class="form-control form-control-line" name="description"
										placeholder="the description of the event" >{{ old('description') }}</textarea>
										@if ($errors->has('description'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('description') }}</strong>
		                                    </span>
		                                @endif
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-institution"></i>
										</span>
										<input type="text" name="eventVenue" class="form-control" placeholder="the venue for the event..." value="{{ old('eventVenue') }}">
										@if ($errors->has('eventVenue'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('eventVenue') }}</strong>
		                                    </span>
		                                @endif
									</div>
									<div class="input-group">
										<span class="input-group-addon" >
											<i class="fa fa-calendar"></i>
										</span>
										<input type="text" name="eventDate" class="datepicker" placeholder="date for the event..." value="{{ old('eventDate') }}">
										@if ($errors->has('eventDate'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('eventDate') }}</strong>
		                                    </span>
		                                @endif
									</div><br>

									<div class="input-group">
										<span class="input-group-addon" >
											<i class="fa fa-clock-o"></i>
										</span>
										<input type="time" name="eventTime" class="timepicker" placeholder="time for the event..." value="{{ old('eventTime') }}">
										@if ($errors->has('eventTime'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('eventTime') }}</strong>
		                                    </span>
		                                @endif
									</div>
									
           	
										<div class="form-group {{$errors->has('file') ? 'has-error': ''}}">
								            <div class="col-sm-12">
												<div class="btn btn-primary">
													<span>Upload Image</span>
													<input type="file" name="eventImg" >				
												</div>
											</div>
								            <div class="col-sm-8 col-sm-offset-2">
												@if ($errors->has('eventImg'))
													<em style="color: red;">{{ $errors->first('eventImg') }}</em>
												@endif
											</div>
					         			</div>
									
								</div>
								<div class="footer text-center">
									<button type="submit" class="btn btn-simple btn-primary btn-lg">Add Event</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			@include('frontend.getting_started.partials._footer')

		</div>

    </div>
@endsection