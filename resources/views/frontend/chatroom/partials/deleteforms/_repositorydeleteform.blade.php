<form action="{{ route('post.destroy', $repository->id) }}" id = "deletepostform-{{$repository->id}}" method="post" style="display: none;">
	{{csrf_field()}}
	{{method_field('DELETE')}}
		
</form>