    <nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="#">csc web forum</a>
        	</div>
            @guest
                @if (Request::is('login') || Request::is('/'))
                    <div class="collapse navbar-collapse" id="navigation-example">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{route('login')}}">
                                <i class="fa fa-sign-in"></i> Sign In
                            </a>
                        </li>
                        <li>
                            <a href="{{route('register')}}">
                                <i class="fa fa-user"></i> Sign Up
                            </a>
                        </li>
                        {{-- <li>
                            <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li> --}}
                    </ul>
                </div>
                @endif
                    
                
            @else
                <div class="collapse navbar-collapse" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{route('posts')}}">
                            <i class="fa fa-home"></i> Chatroom
                        </a>
                    </li>
                    <li>
                        <a href="{{route('event.create') }}">
                            <i class="fa fa-plus"></i> Create Event
                        </a>
                    </li>
                    
                </ul>
            </div>
            @endguest
        	
    	</div>
    </nav>