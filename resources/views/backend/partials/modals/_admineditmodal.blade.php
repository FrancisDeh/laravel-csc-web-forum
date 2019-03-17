
<!-- Modal -->
<div class="modal fade" id="myModal-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form class="form" action="{{route('admins.update', $admin->id) }}" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit {{$admin->name}}</h4>
      </div>
      <div class="modal-body">
        	
        	{{csrf_field()}}
        	{{method_field('PUT')}}
          <div class="row">
            <div class="form-group">
              <label class="col-sm-12">Name</label>
                <div class="col-sm-12">
                    <div class="form-group">            
                      <input type="text" name="name" value="{{$admin->name}}" class="form-control" required autofocus>
                    </div>
              </div>
            </div>
          </div>
        	<div class="row">
            <div class="form-group">
              <label class="col-sm-12">Email</label>
                <div class="col-sm-12">
                    <div class="form-group">            
                      <input type="email" name="email" value="{{$admin->email}}" class="form-control" required autofocus>
                    </div>
              </div>
            </div>
          </div>  
          <div class="row">
            <div class="form-group">
              <label class="col-sm-12">Password</label>
              <div class="col-sm-12">
                <div class="form-group">
                  <input type="password" name="password" placeholder="Password..." class="form-control" value="" />
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label class="col-sm-12">Confirm Password</label>
                <div class="col-sm-12">
                  <div class="form-group">
                   <input type="password" name="password_confirmation" placeholder="Password Confirmation..." class="form-control" value="" />
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                    </div>
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