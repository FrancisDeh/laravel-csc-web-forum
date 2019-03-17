{{--Post card for codes--}}
@if (auth()->user()->id == $user->id )
	<div class="container">
	<div class="row">
		<div class="col-md-6">
			<!-- Tabs with icons on Card -->
			<div class="card card-nav-tabs">
				<div class="header header-success" style="height: auto !important;">
					<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
					<div class="nav-tabs-navigation">
						<div class="nav-tabs-wrapper">
							<ul class="nav nav-tabs" data-tabs="tabs">
								<li class="active">
									<a href="#pending" data-toggle="tab">
									
										<b>Pending</b>
										<span class="label label-success">
                    						{{$pending->count()}}
                    					</span>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="tab-content text-center">
						<div class="tab-pane active" id="pending">
							{{--include table here for pending posts--}}
							@include('frontend.chatroom.partials.postcards._pendingtable')
						</div>
					</div>
				</div>
			</div>
			<!-- End Tabs with icons on Card -->
		</div>
	</div>
</div>
@endif

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<!-- Tabs with icons on Card -->
			<div class="card card-nav-tabs">
				<div class="header header-success" style="height: auto !important;">
					<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
					<div class="nav-tabs-navigation">
						<div class="nav-tabs-wrapper">
							<ul class="nav nav-tabs" data-tabs="tabs">
								<li class="active">
									<a href="#codes" data-toggle="tab">
									
										<b><\Codes></b>
										<span class="label label-success">
                    						{{$codes->count()}}
                    					</span>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="tab-content text-center">
						<div class="tab-pane active" id="codes">
							{{--include table here for codes--}}
							@include('frontend.chatroom.partials.postcards._codestable')
						</div>
					</div>
				</div>
			</div>
			<!-- End Tabs with icons on Card -->
		</div>
	</div>
</div>

	{{--Post card for questions--}}
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<!-- Tabs with icons on Card -->
			<div class="card card-nav-tabs">
				<div class="header header-info" style="height: auto !important;">
					<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
					<div class="nav-tabs-navigation">
						<div class="nav-tabs-wrapper">
							<ul class="nav nav-tabs" data-tabs="tabs">
								<li class="active">
									<a href="#questions" data-toggle="tab">
									
										<b><\Questions></b>
										<span class="label label-info">
                    						{{$questions->count()}}
                    					</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="tab-content text-center">
						<div class="tab-pane active" id="questions">
							{{--include table here for questions--}}
							@include('frontend.chatroom.partials.postcards._questionstable')
						</div>
					</div>
				</div>
			</div>
			<!-- End Tabs with icons on Card -->
		</div>
	</div>
</div>

	{{--Post card for publications--}}
	<div class="container">
	<div class="row">
		<div class="col-md-6">
			<!-- Tabs with icons on Card -->
			<div class="card card-nav-tabs">
				<div class="header header-primary" style="height: auto !important;">
					<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
					<div class="nav-tabs-navigation">
						<div class="nav-tabs-wrapper">
							<ul class="nav nav-tabs" data-tabs="tabs">
								<li class="active">
									<a href="#publications" data-toggle="tab">
										
										<b><\Publications></b>
										<span class="label label-primary">
                    						{{$publications->count()}}
                    					</span>
									</a>

								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="tab-content text-center">
						<div class="tab-pane active" id="publications">
							{{--include table here for publications--}}
							@include('frontend.chatroom.partials.postcards._publicationstable')
						</div>
					</div>
				</div>
			</div>
			<!-- End Tabs with icons on Card -->
		</div>
	</div>
</div>

{{--Post card for repository--}}
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<!-- Tabs with icons on Card -->
			<div class="card card-nav-tabs">
				<div class="header header-warning" style="height: auto !important;">
					<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
					<div class="nav-tabs-navigation">
						<div class="nav-tabs-wrapper">
							<ul class="nav nav-tabs" data-tabs="tabs">
								<li class="active">
									<a href="#repository" data-toggle="tab">
										
										<b><\Repository></b>
										<span class="label label-warning">
                    						{{$repositories->count()}}
                    					</span>
									</a>

								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="tab-content text-center">
						<div class="tab-pane active" id="repository">
							{{--include table here for publications--}}
							@include('frontend.chatroom.partials.postcards._repositorytable')
						</div>
					</div>
				</div>
			</div>
			<!-- End Tabs with icons on Card -->
		</div>
	</div>
</div>