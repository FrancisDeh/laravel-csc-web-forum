@isset ($public_data['events'])
	@if (count($public_data['events']) > 0)
	<div class="row">
		<div class="col-md-8 col-md-offset-1 col-sm-12">
			<section class="advert-section">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<!-- Carousel Card -->
					<div class="card card-raised card-carousel">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<div class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
								<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
								<li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								@foreach ($public_data['events'] as $event)					
								<div class="item {{$event->id == 1 ? 'active': '' }}">
									@if(Storage::disk('local')->has('public/events/'.$event->image))
						            <img src="{{ route('eventimage',['filename' => $event->image]) }}" alt="{{$event->title}}"> 
						          @endif
								
									<div class="carousel-caption">
										<h4 style="color: white;">{{$event->title}}</h4>
									</div>
								</div>
								@endforeach
							</div>

							<!-- Controls -->
							<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
								<i class="material-icons">keyboard_arrow_left</i>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
								<i class="material-icons">keyboard_arrow_right</i>
							</a>
						</div>
					</div>
				</div>
					</div>
			</section>
		</div>
	</div>
	<!-- End Carousel Card -->
	@else
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="white-box">
        			<div class="comment-center ">
            			<div class="comment-body">
                			<div class="col-sm-6 col-sm-offset-4">
                    			<h4 style="color: gray;">There are no Events</h4>
                			</div>
            			</div>
       				</div>
				</div>
				</div>
				
			</div>
		</div>
		
	@endif
@endisset