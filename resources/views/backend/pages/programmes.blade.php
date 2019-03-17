@extends('backend.layout.master')
@section('title', 'Programmes')
@section('content')
<!-- /.row -->
                <!-- .row -->
<div class="row">
    <div class="col-md-7 col-xs-12">
        <div class="white-box">
            
                           
        <h4 style="color: gray;">Programmes ({{count($programmes) }})</h4>
        @if(count($programmes) > 0)
          <div class="table-responsive">
               <table class="table table-hover">
                    <thead>
                        <tr>
                           
                            <th>Name</th>
                            
                            <th>Courses</th>
                            <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($programmes as $programme)
                        <tr>
                            <td style="text-align: left;">{{-- <a href="{{route('platform-users-by-programme', ['name' => $programme->name, 'id' => $programme->id ]) }}"> --}}{{ $programme->name }}</a></td>
                           
                            <td style="text-align: left">{{$programme->course()->count() }}</td>
         
                                <td class="td-actions" style="text-align: center;">
                                <button data-toggle="modal" data-target="#myModal-{{$programme->id}}" rel="tooltip" title="Edit programme" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
                                </button>
                                {{--include the edit modal--}}
                                @include('backend.partials.modals._programmeeditmodal')

                                <button type="button" data-toggle="modal" data-target="#deleteModal-{{$programme->id}}" rel="tooltip" title="Remove programme" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                                {{--include the delete modal--}}
                                @include('backend.partials.modals._programmedeletemodal')
                            </td>
                           
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            </div>
        @else
            <p>There are no Programmes</p>
        @endif      

        </div>
    </div>
    <div class="col-md-5 col-xs-12">
        <div class="white-box">
            <h4 style="color: gray;">Enter a Programme</h4>
            <form method="post" action="{{ route('programmes.store') }}" class="form-horizontal form-material">

                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-12">Name</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="B ed Computer Science" class="form-control form-control-line" name="name" required value="{{old('name') }}"> 
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


