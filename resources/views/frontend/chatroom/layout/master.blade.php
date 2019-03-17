<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{URL::to('frontend/material-kit-master/assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" href="{{URL::to('frontend/material-kit-master/assets/img/favicon.png') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>CSC WEB FORUM | @yield('page_title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	@include('frontend.getting_started.partials.styles._main')
	@yield('styles')
	<style type="text/css">
		.label {
			font-size: 12px !important;
			padding: 6px !important;
			margin-left: 5px;
		}
	</style>

	<!--Tinymce scripts-->
   <script type="text/javascript" src = "{{ asset('frontend/tinymce/tinymce.min.js') }}"></script>
   <script type="text/javascript">
     tinymce.init({
        selector: '.textarea',
        plugins : ['advlist autolink link  lists charmap print preview spellchecker',
      'searchreplace wordcount visualblocks visualchars fullscreen insertdatetime',
      'save table contextmenu directionality  paste']
          });

   </script>
</head>

<body class="@yield('body_class')">
@include('frontend.chatroom.partials._navbar')

@yield('wrapper')
</body>

	@include('frontend.getting_started.partials.scripts._main')
	<script type="text/javascript">

		//popover functions
		
			$('#popovertd').popover({
			trigger: 'hover focus',

		})
		



		//when the reply button is clicked, toggle the reply form
		//hide replyForm on startup
		$('.replyForm').hide();

		function toggleReplyForm(id){
		
			$('#replyForm'+id).toggle(500);
		}

		//select2js for programming languages
		  $('.language-select').select2()
		//script to configure like system
		/*Like a post*/
		function toggleLikePost(postId, element){
			var csrfToken = '{{ csrf_token() }}';
			var count = parseInt($('#postLikeCount').text());
			
			//send the like to the route using ajax

			$.post("{{ route('postlike') }}",{ postId: postId , _token: csrfToken}, function(data) {
				

				if(data.message == 'liked'){
					$(element).removeClass('btn-success');
					$(element).addClass('btn-danger');
					$('#postLikeCount').text(count + 1);
				} else {
					$(element).removeClass('btn-danger');
					$(element).addClass('btn-success');
					$('#postLikeCount').text(count - 1);
				}
			});
		}
		/*Like a comment*/
		function toggleLikeComment(commentId, element){
			var csrfToken = '{{csrf_token()}}';
			var count = parseInt($('#commentLikeCount' + commentId).text());
			//send the like to the route using ajax
			$.post("{{route('commentlike') }}", {commentId: commentId, _token:csrfToken}, function(data) {
				if(data.message == 'liked'){
					$(element).removeClass('btn-success');
					$(element).addClass('btn-danger');
					$('#commentLikeCount'+ commentId).text(count + 1);
				} else {
					$(element).removeClass('btn-danger');
					$(element).addClass('btn-success');
					$('#commentLikeCount' + commentId).text(count - 1);
				
				}
			});
		}

		$(document).ready(function(){
			

			/*
				The search button enables search by different parameters, on input
				,the search term is sent to database to find match using jquery's autocomplete
			*/		

			$('#searchUser').autocomplete({
				
				source: '{{route('searchuser')}}'
			});
			$('#searchPost').autocomplete({
				
				source: '{{route('searchpost')}}'
			});



		function hideAndDisableCodeTextArea(){
			//hide and disable code text area
			$('textarea[name="code"]').prop('disabled', true);
			$('#codeDiv').hide();
		}

		function showAndEnableCodeTextArea() {
			// body...
			$('textarea[name="code"]').prop('disabled', false);
			$('#codeDiv').fadeIn();
		}

		//on initial run, if the category type of post is not a code, hide the code textarea
		var cat = $('select[name="categoryOfPost"]').val();
		var cat2 = $('select[name="categoryOfComment"]').val();
		var cat3 = $('select[name="categoryOfReply"]').val();
		if( cat != 2 || cat2 != 2 || cat3 != 2){
			
			hideAndDisableCodeTextArea();
		}

		

		//this function toggles the code text area based on category type selected
		$('select[name="categoryOfPost"]').on('change', function(){
			var category = $(this).val();
			if (category == 2){
				showAndEnableCodeTextArea();
			}
			else {
				hideAndDisableCodeTextArea();
			}

		});
		
		$('select[name="categoryOfComment"]').on('change', function(){
			var category = $(this).val();
			if (category == 2){
				showAndEnableCodeTextArea();
			}
			else {
				hideAndDisableCodeTextArea();
			}

		});

		$('select[name="categoryOfReply"]').on('change', function(){
			var category = $(this).val();
			if (category == 2){
				showAndEnableCodeTextArea();
			}
			else {
				hideAndDisableCodeTextArea();
			}

		});
		
	

		});
	</script>

</html>
