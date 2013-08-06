<!-- Navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li{{ (Request::is('admin') ? ' class="active"' : '') }}><a href="{{ URL::to('admin') }}"><i class="icon-home icon-white"></i> Home</a></li>
                    <li{{ (Request::is('tickets') ? ' class="active"' : '') }}><a href="{{ URL::to('tickets') }}"><i class="icon-home icon-white"></i> Tickets</a></li>
                    <li class="dropdown{{ (Request::is('admin/users*|admin/groups*') ? ' active' : '') }}">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('admin/users') }}">
                            <i class="icon-user icon-white"></i> Users <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li{{ (Request::is('admin/users*') ? ' class="active"' : '') }}><a href="{{ URL::to('admin/users') }}"><i class="icon-user"></i> Users</a></li>
                            <li{{ (Request::is('admin/groups*') ? ' class="active"' : '') }}><a href="{{ URL::to('admin/groups') }}"><i class="icon-user"></i> Groups</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li><a href="{{ URL::to('/') }}">View Homepage</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
