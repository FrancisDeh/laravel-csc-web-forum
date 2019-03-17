@extends('frontend.chatroom.pages.repository')
@section('content')
	@include('frontend.chatroom.partials.session._errormessage')
	@include('frontend.chatroom.partials.session._successmessage')

	<section class="page-content-section">    

		<h2 class="mg-top-40">Upload a File</h2>              
							
		<form class="form well" action="{{ route('file.store') }}" enctype="multipart/form-data" method="post">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group label-floating {{ $errors->has('fileName')? 'has-error': '' }}">
						<label class="control-label col-sm-12">Name of File</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="fileName" autofocus required value="{{ old('fileName') }}">
						</div>
						
						
					</div>
				</div>
			</div>
		
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group {{$errors->has('course') ? 'has-error': ''}}">
			            <label class="col-sm-12">Course</label>
			            <div class="col-sm-12">
			                <select class="form-control form-control-line" name="course" required>
			                	<option value="" disabled selected>Select Course</option>
			                	@foreach($courses as $course)
			                    	<option value="{{$course->id}}" {{ $course->id == old('course') ? 'selected': ''}}>{{$course->coursename->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			            
         			</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group {{$errors->has('file') ? 'has-error': ''}}">
			            <div class="col-sm-12">
							<div class="btn btn-primary">
								<span class="">Select File</span>
						        <input type="file" name="file" required>					
							</div>
						</div>
			            
         			</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group label-floating {{ $errors->has('fileDescription')? 'has-error': '' }}">
						<label class="control-label col-sm-12">Describe File</label>
						<div class="col-sm-12">
							<textarea name="fileDescription" class="form-control" id="" cols="30" autofocus rows="5" required>{{ old('fileDescription') }}</textarea>
							
						</div>
						
						
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
			            <div class="col-sm-12">
			                <button class="btn btn-success" type="submit">Upload &nbsp;<i class="fa fa-upload"></i></button>
			            </div>
        			</div>
				</div>
			</div>
		</form>					  
    </section>
@endsection