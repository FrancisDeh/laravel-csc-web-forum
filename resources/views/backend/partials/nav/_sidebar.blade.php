<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="{{route('admin.home')}}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                   
                     <li>
                        <a href="{{route('platform.users')}}" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Users</a>
                    </li>
                    <li>
                        <a href="{{route('languages.index')}}" class="waves-effect"><i class="fa fa-code fa-fw" aria-hidden="true"></i>Languages</a>
                    </li>
                    <li>
                        <a href="{{route('coursecodes.index') }}" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Course Codes</a>
                    </li>
                    <li>
                        <a href="{{route('coursenames.index')}}" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i>Course Names</a>
                    </li>
                    <li>
                        <a href="{{route('courses.index')}}" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>Courses</a>
                    </li>
                    <li>
                        <a href="{{route('programmes.index')}}" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i>Programmes</a>
                    </li>
                    <li>
                        <a href="{{route('semesters.index')}}" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>Semesters</a>
                    </li> 
                    <li>
                        <a href="{{route('admins.index')}}" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Admins</a>
                    </li>
                    <li>
                        <a href="{{route('developers.index')}}" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Developers</a>
                    </li>
                    <li>
                        <a href="{{route('adminposts.index')}}" class="waves-effect"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Posts</a>
                    </li>

                </ul>
                <div class="center p-20">
                     <a href="{{route('admin.logout') }}" class="btn btn-danger btn-block waves-effect waves-light" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Sign Out</a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                 </div>

            </div>
            
        </div>