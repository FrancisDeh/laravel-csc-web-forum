<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
    	<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
    		</button>
    		<a class="navbar-brand" href="#">CSC WEB FORUM</a>
    	</div>

    	<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
    		<ul class="nav navbar-nav">
				<li class="{{ Route::is('post.show') || Route::is('posts') || Route::is('post.edit') || Route::is('post.create') ? 'active' : '' }}"><a href="{{route('posts')}}">Chatroom</a></li>
        		<li class="{{ Route::is('getcoursematerials') || Route::is('file.create') ? 'active' : '' }}"><a href="{{route('repository') }}">Repository</a></li>
                <li><a href="{{route('event.index') }}">Events</a></li>
        		<li class="dropdown">

        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{auth()->user()->fname }} <b class="caret"></b></a>
        			<ul class="dropdown-menu">
                        <li><a href="{{route('profile', auth()->user()->id)}}">My Profile</a></li>
                      <li><a href="{{route('editprofile')}}">Edit Profile</a></li>
                      <li class="divider"></li>
                      <li><a href="{{route('alluserspage')}}">All Users</a></li>
                      <li class="divider"></li>
                      <li><a href="{{route('event.create') }}">Create Event</a></li>
					  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log Out</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                            </li>

					  
        			</ul>
        		</li>
    		</ul>
    	</div>
	</div>
</nav>