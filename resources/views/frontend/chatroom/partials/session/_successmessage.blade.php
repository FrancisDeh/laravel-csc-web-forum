			{{--session--}}
<div class="row">
	<div class="col-sm-12">
		@if (session()->has('success'))
			<div class="alert alert-success in fade mg-top-20">
            <div class="container-fluid">
				<div class="alert-icon">
					<i class="fa fa-check fa-2x"></i>
				</div>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"><i class="fa fa-times"></i></span>
				</button>
            	<b>Success:</b> {{session('success')}}
            </div>
			</div>
			
		@endif
	</div>
</div>
