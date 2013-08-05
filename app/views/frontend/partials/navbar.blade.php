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
                    <li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ route('home') }}"><i class="icon-home icon-white"></i> Tickets</a></li>
                </ul>

                <ul class="nav pull-right">
                    @if (Sentry::check())

                    <li class="dropdown{{ (Request::is('account*') ? ' active' : '') }}">
                        <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="{{ route('account') }}">
                            Welcome, {{ Sentry::getUser()->first_name }}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            @if(Sentry::getUser()->hasAccess('admin'))
                            <li><a href="{{ route('admin') }}"><i class="icon-cog"></i> Administration</a></li>
                            @endif
                            <li{{ (Request::is('account/profile') ? ' class="active"' : '') }}><a href="{{ route('profile') }}"><i class="icon-user"></i> Your profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <li {{ (Request::is('auth/signin') ? 'class="active"' : '') }}><a href="{{ route('signin') }}">Sign in</a></li>
                    <li {{ (Request::is('auth/signup') ? 'class="active"' : '') }}><a href="{{ route('signup') }}">Sign up</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
