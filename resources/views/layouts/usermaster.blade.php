<!DOCTYPE html>

<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{ Html::style('css/bootstrap.min.css') }}
        {{ Html::style('css/font-awesome.min.css') }}
        {{ Html::style('css/metisMenu.min.css') }}
        {{ Html::style('css/fontawesome-stars.css') }}
        {{ Html::style('css/main.css') }}

        @yield('head')

    </head>
    <body>

        @yield('header')
        @yield('content')
        
        {{ Html::script('js/jquery.min.js') }}
        {{ Html::script('js/bootstrap.min.js') }}
        {{ Html::script('js/metisMenu.min.js') }}
        {{ Html::script('js/jquery.barrating.min.js') }}
        {{ Html::script('js/app.js') }}

        @yield('script')
    </body>
</html>
