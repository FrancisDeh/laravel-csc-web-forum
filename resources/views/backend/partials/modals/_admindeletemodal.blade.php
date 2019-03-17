
<!-- Modal -->
<div class="modal fade" id="deleteModal-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form class="form" action="{{route('admins.destroy', $admin->id) }}" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete {{$admin->name}}</h4>
      </div>
      <div class="modal-body"> 	
        	{{csrf_field()}}
        	{{method_field('DELETE')}}
        	<div class="row">
        		<div class="col-sm-12">
        		<p> Are you sure you want to perform this action?</p>
        	</div>	
        	</div> 	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
     </form>
    </div>
  </div>
</div>