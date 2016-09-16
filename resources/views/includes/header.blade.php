<nav class="navbar navbar-inverse fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">{{ trans('label.brand') }}</a>
        </div>
        @if (Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div class="dropdown-toggle" data-toggle="dropdown" id="dropdown-user">
                        <span class="glyphicon glyphicon-user"></span>
                        {{ Auth::user()->name }}
                        <span class="caret"></span>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a href="#">{{ trans('user.profile') }}</a></li>
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
