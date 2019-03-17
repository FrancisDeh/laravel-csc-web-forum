@extends('backend.layout.master')
@section('title', 'Semesters')
@section('content')
<!-- /.row -->
                <!-- .row -->
<div class="row">
    <div class="col-md-7 col-xs-12">
        <div class="white-box">
            
                           
        <h4 style="color: gray;">Semesters ({{count($semesters) }})</h4>
        @if(count($semesters) > 0)
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
                    @foreach ($semesters as $semester)
                        <tr>
                            <td style="text-align: left;">{{-- <a href="{{route('platform-users-by-semester', ['name' => $semester->name, 'id' => $semester->id ]) }}"> --}}{{ $semester->name }}</a></td>
                           
                            <td style="text-align: left">{{$semester->course()->count() }}</td>
         
                                <td class="td-actions" style="text-align: center;">
                                <button data-toggle="modal" data-target="#myModal-{{$semester->id}}" rel="tooltip" title="Edit semester" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
                                </button>
                                {{--include the edit modal--}}
                                @include('backend.partials.modals._semestereditmodal')

                                <button type="button" data-toggle="modal" data-target="#deleteModal-{{$semester->id}}" rel="tooltip" title="Remove semester" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                                {{--include the delete modal--}}
                                @include('backend.partials.modals._semesterdeletemodal')
                            </td>
                           
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            </div>
        @else
            <p>There are no Semesters</p>
        @endif      

        </div>
    </div>
    <div class="col-md-5 col-xs-12">
        <div class="white-box">
            <h4 style="color: gray;">Enter a Semester</h4>
            <form method="post" action="{{ route('semesters.store') }}" class="form-horizontal form-material">

                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-md-12">Name</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="First Semester" class="form-control form-control-line" name="name" required value="{{old('name') }}"> 
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


