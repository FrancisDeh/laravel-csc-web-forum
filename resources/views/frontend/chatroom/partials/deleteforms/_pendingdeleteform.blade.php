<form action="{{ route('post.destroy', $pend->id) }}" id = "deletepostform-{{$pend->id}}" method="post" style="display: none;">
	{{csrf_field()}}
	{{method_field('DELETE')}}
		
</form>
