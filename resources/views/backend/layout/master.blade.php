<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('frontend/ample-admin-lite/plugins/images/favicon.png') }}">
    <title>@yield('title')</title>
    @include('backend.partials.styles._styles')
    @yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of
     HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('backend.partials.nav._nav')
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('backend.partials.nav._sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                {{--Mini Bar--}}
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">@yield('title')</h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                     <ul class="nav navbar-top-links navbar-right pull-right">
                        <li>
                           {{--  @if(Request::is('coursecodes'))
                            <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                                <input type="text" placeholder="Search Course Codes..." class="form-control" id="searchCourseCode"> <a href=""><i class="fa fa-search"></i></a> </form>
                            @elseif (Request::is('coursenames') || Request::is('courses'))
                                <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                                <input type="text" placeholder="Search Course Names..." class="form-control" id="searchCourseName"> <a href=""><i class="fa fa-search"></i></a> </form>
                            @else
                                <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                                <input type="text" placeholder="Search Posts..." class="form-control" id="searchPlatformPost"> <a href=""><i class="fa fa-search"></i></a> </form>
                            @endif --}}

                        </li>         
                     </ul>
                    </div>
                </div>
                {{--temporal sessions--}}
                 @include('backend.partials.session._successmessage')
                @include('backend.partials.session._errormessage')


                @yield('content')
                
            </div>
        </div>
            <!-- /.container-fluid -->
           @include('backend.partials.nav._footer')
    </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   @include('backend.partials.scripts._scripts')
   <script type="text/javascript">

        //select2js for programming languages
          $('.coursecode-select').select2()
          $('.coursename-select').select2()
          $('.semester-select').select2()
          $('.programme-select').select2()
          $('.level-select').select2()
       

        $(document).ready(function(){
            

            /*
                The search button enables search by different parameters, on input
                ,the search term is sent to database to find match using jquery's autocomplete
            */      

            $('#searchPlatformUser').autocomplete({
                
                source: '{{route('searchplatformuser')}}'
            });

             $('#searchCourseCode').autocomplete({
                
                source: '{{route('searchcoursecode')}}'
            });

              $('#searchCourseName').autocomplete({
                
                source: '{{route('searchcoursename')}}'
            });

            $('#searchPlatformPost').autocomplete({
                
                source: '{{route('searchplatformpost')}}'
            });
        
    

        });
    </script>


</body>

</html>
