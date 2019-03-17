
<form action="{{ route('post.destroy', $code->id) }}" id = "deletepostform-{{$code->id}}" method="post" style="display: none;">
	{{csrf_field()}}
	{{method_field('DELETE')}}
		
</form>
	

