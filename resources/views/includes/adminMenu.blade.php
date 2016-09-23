<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{!! route('admin.home') !!}">{!! trans('admin.logo') !!}</a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        @include('includes.adminAlert')
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> {!! trans('general.profile') !!}</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> {!! trans('general.setting') !!}</a>
                </li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> {!! trans('general.logout') !!}</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{!! route('admin.home') !!}"><i class="fa fa-dashboard fa-fw"></i> {!! trans('admin.dashboard') !!}</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                        {!! trans('admin.manage', ['name' => trans('admin.category')]) !!}
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{!! route('admin.category.create') !!}">
                                {!! trans('admin.add_new', ['name' => trans('admin.category')]) !!}
                            </a>
                        </li>
                        <li>
                            <a href="{!! route('admin.category.index') !!}">
                                {!! trans('admin.list', ['name' => trans('admin.category')]) !!}
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        {!! trans('admin.manage', ['name' => trans('admin.book')]) !!}
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{!! route('admin.book.create') !!}">{!! trans('admin.add_new', ['name' => trans('admin.book')]) !!}</a>
                        </li>
                        <li>
                            <a href="{!! route('admin.book.index') !!}">{!! trans('admin.list', ['name' => trans('admin.book')]) !!}</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{!! route('admin.bookRequest.index') !!}">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        {!! trans('admin.manage', ['name' => trans('admin.book_request')]) !!}
                    </a>
                </li>
                <li>
                    <a href="{!! route('admin.user.index') !!}">
                        <i class="fa fa-group fa-fw"></i>
                        {!! trans('admin.manage', ['name' => trans('admin.user')]) !!}
                    </a>
                </li>
                <li>
                    <a href="{!! route('admin.review.index') !!}">
                        <i class="fa fa-sticky-note" aria-hidden="true"></i>
                        {!! trans('admin.list', ['name' => trans('admin.review')]) !!}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
