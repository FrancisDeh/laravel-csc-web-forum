@extends('backend.layout.master')
@section('title', 'Course Names')
@section('content')
<!-- /.row -->
                <!-- .row -->
<div class="row">
    <div class="col-md-7 col-xs-12">
        <div class="white-box">
            
                           
        <h4 style="color: gray;">Course Names ({{count($coursenames) }})</h4>
        @if(count($coursenames) > 0)
          <div class="table-responsive">
               <table class="table table-hover">
                    <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Status</th>
                            <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($coursenames as $coursename)
                        <tr>
                            <td style="text-align: left;">{{-- <a href="{{route('platform-users-by-coursename', ['name' => $coursename->name, 'id' => $coursename->id ]) }}"> --}}{{ $coursename->name }}</a></td>
                            <td style="text-align: left;">
                               @isset($coursename->created_at)
                                    {{$coursename->created_at->diffForHumans()}}
                                @else
                                    Empty
                                @endisset
                            </td>
                            <td style="text-align: left;">
                                @isset($coursename->updated_at)
                                    {{$coursename->updated_at->diffForHumans()}}
                                @else
                                    Empty
                                @endisset
                            </td>
                                <td>{!! $coursename->course()->count() == 1 ? '<i class="text-success fa fa-check"></i>' : '<i class="text-danger fa fa-times"></i>' !!}</td>
                                <td class="td-actions" style="text-align: center;">
                                <button data-toggle="modal" data-target="#myModal-{{$coursename->id}}" rel="tooltip" title="Edit coursename" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
                                </button>
                                {{--include the edit modal--}}
                                @include('backend.partials.modals._coursenameeditmodal')

                                <button type="button" data-toggle="modal" data-target="#deleteModal-{{$coursename->id}}" rel="tooltip" title="Remove coursename" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                                {{--include the delete modal--}}
                                @include('backend.partials.modals._coursenamedeletemodal')
                            </td>
                           
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            </div>
        @else
            <p>There are no Course Names</p>
        @endif      

        </div>
    </div>
    <div class="col-md-5 col-xs-12">
        <div class="white-box">
            <h4 style="color: gray;">Enter a Course Name</h4>
            <form method="post" action="{{ route('coursenames.store') }}" class="form-horizontal form-material">

                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-12">Name</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Algorithm" class="form-control form-control-line" name="name" required value="{{old('name') }}"> 
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

