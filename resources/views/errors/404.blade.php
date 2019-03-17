<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{URL::to('frontend/material-kit-master/assets/img/favicon.png') }}">
    <title>cscwebforum | Error Page</title>
   @include('frontend.getting_started.partials.styles._main')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="text-danger">404</h1>
                <h3 class="text-uppercase">Page Not Found !</h3>
                <p class="text-muted m-t-30 m-b-30">We are sorry you run into this error...</p>
                <a href="{{route('errorredirect') }}" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Back to home</a> </div>
            <footer class="footer text-center">2017 © cscwebforum.</footer>
        </div>
    </section>
   @include('frontend.getting_started.partials.scripts._main')
</body>

</html>

