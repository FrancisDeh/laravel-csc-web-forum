@extends('frontend.getting_started.layout.master')
@section('page_title', 'Welcome')

@section('body_class', 'landing-page')
@section('wrapper')

<style type="text/css">
	.card-events{
		margin-top: 80px;
	}
</style>
<div class="wrapper">
        <div class="header header-filter" style="background-image: url('images/landing2.jpg');">
            
        </div>
  <div class="container-fluid"> 
  <h1><span class="badge amber darken-2">CITSA EVENTS</span></h1>
		<div class="row">
    
     @foreach($events as $event)
      <div class="col-md-4 col-sm-4">
         <div class="card" style="margin-top: 25px;">
            <div class="card-image">
              @if(Storage::disk('local')->has('public/events/'.$event->image))
            <img src="{{ route('eventimage',['filename' => $event->image]) }}"  style="height: 100%; width: 100%;"> 
          @endif
            </div>
             
               <div class="card-body">
                  <h4 class="card-title text-center">{{$event->title}}</h4><hr>    
                  <p class="card-text blue-text">{{$event->description}}</p> 
                  <p class="card-text blue-text">Venue: {{$event->eventVenue}}</p>
                  <p class="card-text blue-text">Date: {{$event->eventDate}}</p>
                  <p class="card-text blue-text">Time: {{$event->eventTime}}</p>   
                </div>
          </div>
      </div>
     @endforeach
     
     

      <!--
      <div class="col-md-4 col-sm-4">
         <div class="card">
             <img src="frontend/material-kit-master/assets/img/christian.jpg" class="img-fluid" alt="" style="height: 100%; width: 100%;"> 
               <div class="card-body">
                  <h4 class="card-title text-center">CITSA EVENTS</h4><hr>    
                  <p class="card-text blue-text">divide details about your product or agency work into parts. Write a few lines about each one.</p>
                </div>
          </div>
      </div>
      <div class="col-md-4 col-sm-4">
         <div class="card">
             <img src="frontend/material-kit-master/assets/img/christian.jpg" class="img-fluid" alt="" style="height: 100%; width: 100%;">
               <div class="card-body">
                  <h4 class="card-title text-center">CITSA EVENTS</h4><hr>    
                  <p class="card-text blue-text">divide details about your product or agency work into parts. Write a few lines about each one.</p>
                </div>
          </div>
      </div>
    </div>  
  </div> -->
</div>
	    @include('frontend.getting_started.partials._footer')


	</div>
@endsection