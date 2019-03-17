
<!-- Modal -->
<div class="modal fade" id="deleteModal-{{$language->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form class="form" action="{{route('languages.destroy', $language->id) }}" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete {{$language->name}}</h4>
      </div>
      <div class="modal-body"> 	
        	{{csrf_field()}}
        	{{method_field('DELETE')}}
        	<div class="row">
        		<div class="col-sm-12">
        		<p> Note that deleting this item will delete all associations that users have with it. Are you sure you want to delete this language?</p>
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