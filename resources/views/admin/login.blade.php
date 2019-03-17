@extends('frontend.getting_started.layout.master')
@section('page_title', 'Admin Login')

@section('body_class', 'signup-page')
@section('wrapper')

        <div class="wrapper">
        <div class="header header-filter" style="background-image: url('images/landing3.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="card card-signup">
                            <form class="form" method="post" action="{{route('admin') }}">

                                {{csrf_field()}}
                                <div class="header header-primary text-center">
                                    <h4>Admin Sign In</h4>
                                </div>
                                <div class="content">

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control" placeholder="Email..." name="email" value="{{old('email') }}">
                                         @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" placeholder="Password..." class="form-control" name="password"/>
                                         @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Remember Me
                                        </label>
                                    </div> 
                           
                             </div>

                               
                                <div class="footer text-center">
                                    <button  type="submit" class="btn btn-simple btn-primary btn-lg">Sign In</button>
                                </div>
                                <div class="footer text-center">
                                    <a href="{{ route('admin.password.request') }}" class="btn btn-simple btn-primary btn-lg">Forgot Your Password?</a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @include('frontend.getting_started.partials._footer')

        </div>

    </div>
@endsection