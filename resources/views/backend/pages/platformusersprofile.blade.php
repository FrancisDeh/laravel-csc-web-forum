@extends('backend.layout.master')
@section('title', 'Platform User')

@section('content')

{{--Cards--}}
<div class="row">
    <div class="col-lg-4 col-sm-6 col-xs-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Codes</h3>
            <ul class="list-inline two-part">
                <li>
                    <div id="sparklinedash"></div>
                </li>
                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{$codes->count()}}</span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Questions</h3>
            <ul class="list-inline two-part">
                <li>
                    <div id="sparklinedash2"></div>
                </li>
                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">{{$questions->count()}}</span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Publications</h3>
            <ul class="list-inline two-part">
                <li>
                    <div id="sparklinedash3"></div>
                </li>
                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">{{$publications->count()}}</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-sm-6 col-xs-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Repository</h3>
            <ul class="list-inline two-part">
                <li>
                    <div id="sparklinedash"></div>
                </li>
                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{$repositories->count()}}</span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Comments</h3>
            <ul class="list-inline two-part">
                <li>
                    <div id="sparklinedash2"></div>
                </li>
                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">{{$comments->count()}}</span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Replies</h3>
            <ul class="list-inline two-part">
                <li>
                    <div id="sparklinedash3"></div>
                </li>
                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">{{$replies->count()}}</span></li>
            </ul>
        </div>
    </div>
</div>
{{--Profile Picture And Form--}}

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
                <div class="user-bg"> <img width="100%" alt="user" src="{{URL::to('frontend/ample-admin-lite/plugins/images/large/img1.jpg') }}">
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)">
                                @if(Storage::disk('local')->has('public/profile/'.$user->image))
                                    <img src="{{ route('userimage',['filename' => $user->image]) }}" class="thumb-lg img-circle" alt="img" >    
                                 @endif
                            </a>
                            <h4 class="text-white">{{ $user->fname." ".$user->sname }}</h4>
                            <h5 class="text-white">{{$user->email}}</h5>
                            <h5 class="text-white">{!! $user->bio !!}</h5> 
                        </div>
                    </div>
                </div>
                <div class="user-btm-box">
                    
                     @foreach ($user->language as $language)
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-purple"><i class="ti-facebook"></i></p>
                        <h4><span class="label label-danger">
                                {{$language->name}}
                            </span>
                        </h4> 
                    </div>
                     @endforeach
                    
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box">
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <td style="text-align: left;"><i class="fa fa-book text-info fa-2x"></i></td>
                    <td style="text-align: left;">
                        @isset ($user->programme->name)
                        {{ $user->programme->name}}
                        @else
                            Not Set
                        @endisset
                </td>
                </tr>
                <tr>
                    <td style="text-align: left;"><i class="fa fa-bars text-info fa-2x"></i></td>
                    <td style="text-align: left;">
                        @isset ($user->level)
                            {{$user->level}}

                          @else
                Not Set
            @endisset
            
        </td>
    </tr>
    <tr>
        <td style="text-align: left;"><i class="fa fa-transgender text-info fa-2x"></i></td>
        <td style="text-align: left;">
           @isset ($user->gender)
                {{$user->gender}}
            @else
                Not Set
            @endisset
        </td>
    </tr>
    <tr>
        <td style="text-align: left;"><i class="fa fa-whatsapp text-success fa-2x"></i></td>
        <td style="text-align: left;">
             @isset ($user->whatsapp_contact)
                {{$user->whatsapp_contact }}
            @else
                Not Set
            @endisset
         
        </td>
    </tr>
    <tr>
        <td style="text-align: left;"><i class="fa fa-phone text-info fa-2x"></i></td>
        <td style="text-align: left;">
            @isset ($user->other_contact)
                {{$user->other_contact}}
            @else
                Not Set
            @endisset
        </td>
    </tr>
    <tr>
        <td style="text-align: left; color: blue;"><i class="fa fa-facebook fa-2x"></i></td>
        <td style="text-align: left;">
             @isset ($user->facebook_handle)
                <a href="https://{{$user->facebook_handle}}">{{$user->facebook_handle}}</a>
            @else
                Not Set
            @endisset
            
        </td>
    </tr>
   
</tbody>
</table> 
</div>  
    </div>
</div>
</div>


@stop