<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>CSC WEB FORUM | @yield('page_title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	@include('frontend.getting_started.partials.styles._main')

</head>

<body class="@yield('body_class')">
@include('frontend.getting_started.partials._navbar')

@yield('wrapper')
</body>

	@include('frontend.getting_started.partials.scripts._main')
	{{-- <script type="text/javascript">
		var interval_time = 5000;//in milliseconds
		setInterval(changeHeroImage,interval_time);
		function changeHeroImage(){
		var imgCount = 3;
		    var dir = '{{ URL::to('images') }}/';
		    var randomCount = Math.round(Math.random() * (imgCount - 1)) + 1;
		    var images = new Array
		            images[1] = "landing1.jpg",
		            images[2] = "landing2.jpg",
		            images[3] = "landing3.jpg",
		    document.getElementById("landingHero").style.backgroundImage = "url(" + dir + images[randomCount] + ")";
		}
	</script>
 --}}
</html>
