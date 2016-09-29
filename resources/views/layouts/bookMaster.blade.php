@extends('layouts.usermaster')

@section('header')
@include('includes.header')
@endsection

@section('head')
{{ Html::style('css/book.css') }}
@endsection

@section('content')
<div class="container-fluid" style="margin-top: 40px;">
    <div class="col-sm-3">
        <ul class="nav nav-pills nav-stacked" id="book-menu">
            {!! $bookMenu !!}
        </ul>
    </div>
    <div class="col-sm-8">
        <h3 class="body-title">
            @yield('body_title')
        </h3>
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li><a href="{!! route('book.index') !!}">{!! trans('book.all_book') !!}</a></li>
                {!! $breadcrumbs !!}
            </ul>
        </div>
        @yield('body')
    </div>
</div>
<footer style="min-height: 100px; margin-top: 3em; background-color: #122b40; color: wheat">
</footer>
@endsection
