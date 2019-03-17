<form action="{{ route('post.destroy', $question->id) }}" id = "deletepostform-{{$question->id}}" method="post" style="display: none;">
	{{csrf_field()}}
	{{method_field('DELETE')}}
		
</form>