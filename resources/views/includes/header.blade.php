<nav class="navbar navbar-inverse fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">{{ trans('label.brand') }}</a>
        </div>
        @if (Auth::check())
            <ul class="nav navbar-nav navbar-right user-header">
                <li>
                    <div class="dropdown-toggle dropdown-user" data-toggle="dropdown">
                        <img src="{{ Auth::user()->avatar_link }}" alt="avt-img">
                        {{ Auth::user()->name }}
                        <span class="caret"></span>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('users.show', Auth::user()->id) }}">{{ trans('user.profile.label') }}</a></li>
                        <li><a href="#">{{ trans('user.timeline') }}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('signout') }}">{{ trans('user.logout') }}</a></li>
                    </ul>
                </li>
            </ul>
        @else
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('getSignup') }}">
                        <span class="glyphicon glyphicon-user"></span>
                        {{ trans('user.register') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('getSignin') }}">
                        <span class="glyphicon glyphicon-log-in"></span>
                        {{ trans('user.login') }}
                    </a>
                </li>
            </ul>
        @endif
    </div>
</nav>
