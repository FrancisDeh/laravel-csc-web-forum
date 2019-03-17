<div class="card">
	<form class="form" method="post" action="{{ route('updateprofilepictureinfo', auth()->user()->id) }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		
		
		<div class="content">

			<div class="form-group {{$errors->has('image') ? 'has-error': ''}}">
	            <div class="col-sm-12">
					<div class="btn btn-primary">
						<span>Upload Image</span>
						<input type="file" name="image" >				
					</div>
				</div>
	            <div class="col-sm-8 col-sm-offset-2">
					@if ($errors->has('image'))
						<em style="color: red;">{{ $errors->first('image') }}</em>
					@endif
				</div>
			</div>
		</div>
		<div class="footer text-center">
			<button type="submit" class="btn btn-simple btn-primary btn-lg">Update Info</button>
		</div>
	</form>
</div>
