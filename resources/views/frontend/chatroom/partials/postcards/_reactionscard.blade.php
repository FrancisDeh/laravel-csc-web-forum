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
									<a href="#comments" data-toggle="tab">
									
										<b><\Comments></b>
										<span class="label label-danger">
                    						{{$comments->count()}}
                    					</span>
									</a>
								</li>
								<li>
									<a href="#replies" data-toggle="tab">
									
										<b><\Replies></b>
										<span class="label label-danger">
                    						{{$replies->count()}}
                    					</span>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="tab-content text-center">
						<div class="tab-pane active" id="comments">
							{{--include table here for codes--}}
							@include('frontend.chatroom.partials.postcards._commentstable')
						</div>
						<div class="tab-pane" id="replies">
							{{--include table here for codes--}}
							@include('frontend.chatroom.partials.postcards._repliestable')
						</div>
					</div>
				</div>
			</div>
			<!-- End Tabs with icons on Card -->
		</div>
	</div>
</div>
