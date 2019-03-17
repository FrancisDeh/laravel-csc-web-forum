<div class="card">
	<form class="form" method="post" action="{{ route('updatepersonalinfo', auth()->user()->id) }}">
		{{ csrf_field() }}
		
		
		<div class="content">

			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-user-secret"></i>
				</span>
				<input type="text" name="firstName" class="form-control" placeholder="First Name..." value="{{ auth()->user()->fname }}">
				@if ($errors->has('firstName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('firstName') }}</strong>
                    </span>
                @endif
			</div>

			<div class="input-group">
				<span class="input-group-addon">
				<i class="fa fa-user-secret"></i>
				</span>
				<input type="text" name="surname" class="form-control" placeholder="Surname..." value="{{ auth()->user()->sname }}">
				@if ($errors->has('surname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </span>
                @endif
			</div>

			<div class="input-group {{$errors->has('gender') ? 'has-error': ''}}">
			            <span class="input-group-addon">
							<i class="fa fa-transgender"></i>
						</span>
			            <div class="col-sm-12">
			                <select class="form-control form-control-line" name="gender" required>
			                	<option value="" disabled selected>Select Gender</option>
			                	<option value="M" {{ auth()->user()->gender == 'M'? 'selected': ''}}>Male</option>
			                	<option value="F" {{ auth()->user()->gender == 'F'? 'selected': ''}}>Female</option>
			                </select>
			            </div>
			            
         			</div>

			<div class="input-group">
				<span class="input-group-addon">
				<i class="fa fa-whatsapp"></i>
				</span>
				<input type="text" name="whatsappContact" class="form-control" placeholder="Whatsapp Contact" value="{{ auth()->user()->whatsapp_contact }}">
				@if ($errors->has('whatsappContact'))
                    <span class="help-block">
                        <strong>{{ $errors->first('whatsappContact') }}</strong>
                    </span>
                @endif
			</div>

			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-phone"></i>
				</span>
				<input type="text" name="otherContact" placeholder="Other Contact" class="form-control" value="{{ auth()->user()->other_contact }}" />
				@if ($errors->has('otherContact'))
                    <span class="help-block">
                        <strong>{{ $errors->first('otherContact') }}</strong>
                    </span>
                @endif
			</div>
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-facebook"></i>
				</span>
				<input type="text" name="facebookHandle" class="form-control" value="{{ auth()->user()->facebook_handle }}" placeholder="www.facebook.com/myfacebookname" />
			</div>
			<div class="input-group {{$errors->has('programmeId') ? 'has-error': ''}}">
			            <span class="input-group-addon">
							<i class="fa fa-book"></i>
						</span>
			            <div class="col-sm-12">
			                <select class="form-control form-control-line" name="programmeId" required>
			                	<option value="" disabled selected>Select Programme</option>
			                	@foreach ($programmes as $programme)
			                		
			                		<option value="{{$programme->id}}" {{ auth()->user()->programme_id == $programme->id ? 'selected': ''}}>{{$programme->name}}</option>
			                	@endforeach                	
			        
			                </select>
			            </div>
			            
         			</div>
         	<div class="input-group {{$errors->has('level') ? 'has-error': ''}}">
			           <span class="input-group-addon">
							<i class="fa fa-bars"></i>
						</span>
			            <div class="col-sm-12">
			                <select class="form-control form-control-line" name="level" required>
			                	<option value="" disabled>Select Level</option>
			                	<option value="100" {{auth()->user()->level == 100 ? 'selected' : ''}}>100</option>
			                	<option value="200" {{auth()->user()->level == 200 ? 'selected' : ''}}>200</option>
			                	<option value="300" {{auth()->user()->level == 300 ? 'selected' : ''}}>300</option>
			                	<option value="400" {{auth()->user()->level == 400 ? 'selected' : ''}}>400</option>
			                </select>
			            </div>
			            
         	</div>
         	<div class="input-group {{$errors->has('programmingLanguageId') ? 'has-error': ''}}">
			            <span class="input-group-addon">
							<i class="fa fa-code"></i>
						</span>
			            <div class="col-sm-12">
			                <select class="form-control form-control-line language-select" name="programmingLanguageId[]" multiple>
			                	<option value="" disabled>Programming Language</option>
			                	@foreach ($languages as $language)
			                		<option value="{{$language->id }}"
			                			@foreach(auth()->user()->language as $lang)
                        					{{ $lang->pivot->programming_language_id == $language->id ? 'selected' : ''}}
					                      @endforeach
					                      >{{$language->name }}
					                 </option>
					           	@endforeach
			                </select>
			  </div>
			            
         	</div>
         	<div class="row">
				<div class="col-sm-12">
					<div class="form-group label-floating {{$errors->has('bio') ? 'has-error' : '' }}">
				        <label class="col-md-12">About Yourself</label>
				        <div class="col-md-12">
				            <textarea rows="8" class="form-control form-control-line textarea" name="bio" >{{ auth()->user()->bio }}</textarea>
				        </div>
       				</div>
       				
				</div>
			</div>
		</div>
		<div class="footer text-center">
			<button type="submit" class="btn btn-simple btn-primary btn-lg">Update Info</button>
			
		</div>
	</form>
</div>
