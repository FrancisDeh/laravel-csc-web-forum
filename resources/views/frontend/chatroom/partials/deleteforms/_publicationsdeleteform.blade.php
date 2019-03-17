<form action="{{ route('post.destroy', $publication->id) }}" id = "deletepostform-{{$publication->id}}" method="post" style="display: none;">
	{{csrf_field()}}
	{{method_field('DELETE')}}
		
</form>