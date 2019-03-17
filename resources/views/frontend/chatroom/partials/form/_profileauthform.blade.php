<div class="card">
	<form class="form" method="post" action="{{ route('updateauthinfo', auth()->user()->id) }}">
		{{ csrf_field() }}
		
		
		<div class="content">

			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-envelope"></i>
				</span>
				<input type="email" name="email" class="form-control" placeholder="Email..." value="{{ auth()->user()->email }}">
				@if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
			</div>

			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-lock"></i>
				</span>
				<input type="password" name="password" placeholder="Password..." class="form-control" value="{{ old('password') }}" />
				@if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
			</div>

			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-lock"></i>
				</span>
				<input type="password" name="password_confirmation" placeholder="Password Confirmation..." class="form-control" value="{{ old('password_confirmation') }}" />
			</div>

		</div>
		<div class="footer text-center">
			<button type="submit" class="btn btn-simple btn-primary btn-lg">Update Info</button>
		</div>
	</form>
</div>
