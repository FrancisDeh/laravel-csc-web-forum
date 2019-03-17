@extends('backend.layout.master')
@section('title', 'Programming Languages')
@section('content')
<!-- /.row -->
                <!-- .row -->
<div class="row">
    <div class="col-md-7 col-xs-12">
        <div class="white-box">
            
                           
        <h4 style="color: gray;">Programming Languages ({{count($public_data['languages']) }})</h4>
        @if(count($public_data['languages']) > 0)
          <div class="table-responsive">
               <table class="table table-hover">
                    <thead>
                        <tr>
                           
                            <th>Title</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th class="text-right"><i class="fa fa-user"></i></th>
                            <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($public_data['languages'] as $language)
                        <tr>
                            <td style="text-align: left;"><a href="{{route('platform-users-by-language', ['name' => $language->name, 'id' => $language->id ]) }}">{{ $language->name }}</a></td>
                            @isset ($language->created_at)
                                <td style="text-align: left;">{{$language->created_at->diffForHumans()}}</td>
                            @else   
                            <td>Empty</td>
                            @endisset
                            @isset ($language->updated_at)
                                <td style="text-align: left;">{{$language->updated_at->diffForHumans()}}</td>
                            @else
                            <td>Empty</td>
                            @endisset
                            
                            <td class="text-right">{{$language->user->count()}}</td>
                            

                            
                                <td class="td-actions" style="text-align: center;">
                                <button data-toggle="modal" data-target="#myModal-{{$language->id}}" rel="tooltip" title="Edit Language" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
                                </button>
                                {{--include the edit modal--}}
                                @include('backend.partials.modals._languageeditmodal')

                                <button type="button" data-toggle="modal" data-target="#deleteModal-{{$language->id}}" rel="tooltip" title="Remove Language" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                                {{--include the delete modal--}}
                                @include('backend.partials.modals._languagedeletemodal')
                            </td>
                           
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            </div>
        @else
            <p>There are no Languages</p>
        @endif      

        </div>
    </div>
    <div class="col-md-5 col-xs-12">
        <div class="white-box">
            <h4 style="color: gray;">Enter a Programming Language</h4>
            <form method="post" action="{{ route('languages.store') }}" class="form-horizontal form-material">

                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-12">Name</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Java" class="form-control form-control-line" name="name" required value="{{old('name') }}"> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type = "submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@stop
