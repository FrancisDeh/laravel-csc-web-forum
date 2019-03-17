			{{--session--}}
<div class="row">
	<div class="col-sm-12">
		@if (session()->has('success'))
			<div class="alert alert-success fade in">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times"></i></span>
				</button>
            	<b>Success:</b> {{session('success')}}
			</div>
			
		@endif
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		@if (session()->has('error'))
			<div class="alert alert-danger fade in">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times"></i></span>
				</button>
            	<b>Error:</b> {{session('error')}}
			</div>
			
		@endif
	</div>
</div>
