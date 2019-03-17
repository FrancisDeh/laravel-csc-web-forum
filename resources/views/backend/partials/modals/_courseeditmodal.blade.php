
<!-- Modal -->
<div class="modal fade" id="myModal-{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form class="form" action="{{route('courses.update', $course->id) }}" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit {{$course->coursename->name}}</h4>
      </div>
      <div class="modal-body">
        	
        	{{csrf_field()}}
        	{{method_field('PUT')}}
          <div class="row">
            <div class="form-group">
                    <label class="col-sm-12">Name</label>
                    <div class="col-sm-12">
                        <select name="coursenameId" class="form-control form-control-line coursename-select" style="width: 100%;">
                           
                            @foreach ($public_data['coursenames'] as $names)
                               <option value="{{$names->id}}" {{$names->id == $course->coursename->id ? 'selected' : ''}}>{{$names->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
          </div>
        	<div class="row">
            <div class="form-group">
                    <label class="col-sm-12" style="margin-top: 20px;">Select Code for Course</label>
                    <div class="col-sm-12">
                        <select name="coursecodeId" class="form-control form-control-line coursecode-select" style="width: 100%;">
                           
                            @foreach ($public_data['coursecodes'] as $codes)
                               <option value="{{$codes->id}}" {{$codes->id == $course->coursecode->id ? 'selected' : ''}}>{{$codes->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
          </div>  
          <div class="row">
            <div class="form-group">
                    <label class="col-sm-12" style="margin-top: 20px;">Select Programme for Course</label>
                    <div class="col-sm-12">
                        <select name="programmeId" class="form-control form-control-line programme-select" style="width: 100%;">
                           
                            @foreach ($public_data['programmes'] as $programme)
                               <option value="{{$programme->id}}" {{$programme->id == $course->programme->id ? 'selected' : ''}}>{{$programme->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
          </div>
          <div class="row">
            <div class="form-group">
                    <label class="col-sm-12" style="margin-top: 20px;">Select Level for Course</label>
                    <div class="col-sm-12">
                        <select name="level" class="form-control form-control-line level-select" style="width: 100%;">
                            
                            <option value="100" {{$course->level == 100 ? 'selected' : ''}}>100</option>
                            <option value="200" {{$course->level == 200 ? 'selected' : ''}}>200</option>
                            <option value="300" {{$course->level == 300 ? 'selected' : ''}}>300</option>
                            <option value="400" {{$course->level == 400 ? 'selected' : ''}}>400</option>
                        </select>
                    </div>
                </div>
          </div>  
                
                
                <div class="row">
                  <div class="form-group">
                    <label class="col-sm-12" style="margin-top: 20px;">Select Semester for Course</label>
                    <div class="col-sm-12">
                        <select name="semesterId" class="form-control form-control-line semester-select" style="width: 100%;">
                             <option disabled selected>Select Semester</option>
                            @foreach ($public_data['semesters'] as $semester)
                               <option value="{{$semester->id}}" {{$semester->id == $course->semester->id ? 'selected' : ''}}>{{$semester->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </div>	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
     </form>
    </div>
  </div>
</div>