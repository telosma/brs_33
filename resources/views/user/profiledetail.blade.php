@extends('layouts.usermaster')

@section('header')

@include('includes.header')

@endsection

@section('content')

<div class="profile view-profile col-md-8 col-md-offset-2">
    @include('includes.error')
    @include('includes.message')
    <div class="profile-header">
        {{ trans('user.profile.label') }}
        <i class="fa fa-pencil-square-o icon-edit" data-toggle="tooltip" title="Edit profile"></i>
    </div>
    <div class="show-profile row">
        <div class="col-md-3">
            <div class="avatar">
                <img src="{{ asset(config('upload.image_upload') . $user->avatar_link) }}" alt="avatar-img">
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="cell col-md-3">{{ trans('user.name') }}</div>
                <div class="cell cell-value col-md-5">{{ Auth::user()->name }}</div>
            </div>
            <div class="row">
                <div class="cell col-md-3">{{ trans('user.gender') }}</div>
                <div class="cell cell-value col-md-5">{{ Auth::user()->gender_name }}</div>
            </div>
        </div>
    </div>
</div>
<div class="profile update-profile col-md-8 col-md-offset-2" style="display: none;">
    <div class="profile-header">
        {{ trans('user.update_profile') }}
    </div>
    <div class="show-profile row">
        {{ Form::open(['route' => 'updateProfile', 'method' => 'post', 'files' => true]) }}
            <div class="cell col-md-3">
                <div class="avatar">
                    <img src="{{ asset(config('upload.image_upload') . $user->avatar_link) }}" alt="avatar-img">
                </div>
                {{ Form::file('avatar_link', null) }}
            </div>
            <div class="cell col-md-9">
                <div class="row form-group">
                    <div class="cell col-md-2">
                        <b>{{ trans('user.name') }}</b>
                        <span class="required"></span>
                    </div>
                    <div class="cell cell-edit col-md-6">
                    	{{ Form::text('name', Auth::user()->name, ['class' => 'form-control']) }}
                    	<span class="highlight"></span>
                    	<span class="bar"></span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="cell col-md-2">
                        <b>{{ trans('user.gender') }}</b>
                        <span class="required"></span>
                    </div>
                    <div class="cell cell-edit col-md-6">
                        {{ Form::select(
                            'gender',
                            [
                                1 => trans('user.male'),
                                0 => trans('user.female'),
                            ],
                            Auth::user()->gender,
                            [
                                'class' => 'form-control sl-gender',
                                'id' => 'gender',
                            ]
                        ) }}
                    </div>
                </div>
                {{ Form::submit(trans('user.update'), ['class' => 'btn btn-success']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>

@endsection
