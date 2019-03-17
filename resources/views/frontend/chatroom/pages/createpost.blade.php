@extends('frontend.chatroom.pages.main')
@section('content')
	{{-- Form for post creation --}}
		{{--error and success notifications--}}
    	@include('frontend.chatroom.partials.session._errormessage')

			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 mg-top-20">
					<h3 class="box-title" style="font-size: 1.5em;">Create your Post</h3>
				</div>
			</div>


			<form action="{{ route('post.store') }}" method="POST">
				{{csrf_field()}}
			

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group label-floating {{ $errors->has('titleOfPost')? 'has-error': '' }}">
						<label class="control-label col-sm-12">Title of Post</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="titleOfPost" autofocus required value="{{ old('titleOfPost') }}">
						</div>
						
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group {{$errors->has('categoryOfPost') ? 'has-error': ''}}">
			            <label class="col-sm-12">Type Of Post</label>
			            <div class="col-sm-12">
			                <select class="form-control form-control-line" name="categoryOfPost" required>
			                	<option value="" disabled selected>Select Category of post</option>
			                	@foreach($categories as $category)
			                    	<option value="{{$category->id}}" {{ $category->id == old('categoryOfPost') ? 'selected': ''}}>{{$category->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			            
         			</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group label-floating {{$errors->has('message') ? 'has-error' : '' }}">
				        <label class="col-md-12">Message</label>
				        <div class="col-md-12">
				            <textarea rows="8" class="form-control form-control-line textarea" name="message" >{{ old('message') }}</textarea>
				        </div>
       				</div>
       				
				</div>
			</div>
			<div class="row" id="codeDiv">
				<div class="col-sm-12">
					<div class="form-group label-floating {{$errors->has('code') ? 'has-error' : '' }}">
				        <label class="col-md-12">Code</label>
				        <div class="col-md-12">
				            <textarea rows="2" class="form-control form-control-line" name="code" >{{ old('code') }}</textarea>
				        </div>
       				</div>
       				
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
			            <div class="col-sm-12">
			                <button class="btn btn-success" type="submit">Submit Post</button>
			            </div>
        			</div>
				</div>
			</div>
		</form>
		                                 
	
@stop
