
@extends('backend.layout.master')
@section('title', 'Courses')
@section('content')
<!-- /.row -->
                <!-- .row -->
<div class="row">
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            
                           
        <h4 style="color: gray;">Courses ({{count($courses) }})</h4>
        @if(count($courses) > 0)
          <div class="table-responsive">
               <table class="table table-hover">
                    <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Code</th>
                            <th>Semester</th>
                            <th>Level</th>
                            <th>Programme</th>
                            <th><i class="fa fa-file-o"></i></th>
                            <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td style="text-align: left;">{{-- <a href="{{route('platform-users-by-course', ['name' => $course->name, 'id' => $course->id ]) }}"> --}}{{ $course->coursename->name }}</td>
                            <td style="text-align: left;">{{$course->coursecode->name }} </td>
                             <td style="text-align: left;">{{$course->semester->id }}</td>
                            <td style="text-align: left;">{{$course->level }}</td>
                            <td style="text-align: left;">{{$course->programme->name }}</td>
                            <td style="text-align: left;">{{$course->repository()->count() }}</td>
                           
         
                                <td class="td-actions" style="text-align: center;">
                                <button data-toggle="modal" data-target="#myModal-{{$course->id}}" rel="tooltip" title="Edit course" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
                                </button>
                                {{--include the edit modal--}}
                                @include('backend.partials.modals._courseeditmodal')

                                <button type="button" data-toggle="modal" data-target="#deleteModal-{{$course->id}}" rel="tooltip" title="Remove course" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                                {{--include the delete modal--}}
                                @include('backend.partials.modals._coursedeletemodal')
                            </td>
                           
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            </div>
        @else
            <p>There are no Courses Available</p>
        @endif      

        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <h4 style="color: gray;">Register a Course</h4>
            <form method="post" action="{{ route('courses.store') }}" class="form-horizontal form-material">

                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-12">Select Name for Course</label>
                    <div class="col-sm-12">
                        <select name="coursenameId" class="form-control form-control-line coursename-select">
                            <option selected disabled>Select Course Name</option>
                            @foreach ($public_data['coursenames'] as $names)
                            	 <option value="{{$names->id}}">{{$names->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Select Code for Course</label>
                    <div class="col-sm-12">
                        <select name="coursecodeId" class="form-control form-control-line coursecode-select">
                            <option selected disabled>Select Course Code</option>
                            @foreach ($public_data['coursecodes'] as $codes)
                            	 <option value="{{$codes->id}}">{{$codes->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Select Programme for Course</label>
                    <div class="col-sm-12">
                        <select name="programmeId" class="form-control form-control-line programme-select">
                            <option selected disabled>Select Programme</option>
                            @foreach ($public_data['programmes'] as $programme)
                            	 <option value="{{$programme->id}}">{{$programme->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Select Level for Course</label>
                    <div class="col-sm-12">
                        <select name="level" class="form-control form-control-line level-select">
                            <option disabled selected>Select Level</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Select Semester for Course</label>
                    <div class="col-sm-12">
                        <select name="semesterId" class="form-control form-control-line semester-select">
                             <option disabled selected>Select Semester</option>
                            @foreach ($public_data['semesters'] as $semester)
                            	 <option value="{{$semester->id}}">{{$semester->name }}</option>
                            @endforeach
                        </select>
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

