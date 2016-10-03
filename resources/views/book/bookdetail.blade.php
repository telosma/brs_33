@extends('layouts.usermaster')

@section('head')

{{ Html::style('css/book.css') }}

@endsection

@section('content')
<div class="container">
    <div class="book-detail">
        <div class="panel panel-default book-content col-sm-10 col-sm-offset-1" data-book-id="{{ $book->id }}">
            <div class="panel-body">
                <div class="book-top">
                    <i class="fa fa-bookmark-o book-favorite" aria-hidden="true"></i>
                    <a href="{{ route('getCreateReview', $book->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="{{ trans('user.review.msg_tooltip') }}">
                        {{ trans('user.review.write') }}
                    </a>
                    <div class="fa-pull-right dropdown mark-dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            {{ trans('book.mark') }}
                            <i class="fa " aria-hidden="true"></i>&nbsp;
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                        <ul class="dropdown-menu menu-mark">
                            <li data-mark="1">
                                {{ trans('book.mark_as.reading') }}
                                <i class="fa fa-file-text-o fa-pull-right" aria-hidden="true"></i>
                            </li>
                            <li data-mark="0">
                                {{ trans('book.mark_as.read') }}
                                <i class="fa fa-file-text fa-pull-right" aria-hidden="true"></i>
                            </li>
                            <li data-mark="">
                                {{ trans('book.mark_as.null') }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 book-info">
                        <div class="book-image">
                            <img src="{{ $book->book_image }}">
                        </div>
                        <div class="book-detail" style="text-align: center;">
                            <div style="font-weight: 900; color: blue; font-size: 1.2em; margin-bottom: 0.2em">
                                <a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a>
                            </div>
                            <div style="color: #008340; margin-bottom: 0.1em">{{ $book->author }}</div>
                            <div style="margin-bottom: 0.3em"><em>{{ $book->published_at }}</em></div>
                            <div class="br-wrapper br-theme-fontawesome-stars">
                                <select class="start-barrating book-start" style="display: none;">
                                    @foreach (range(1, config('common.rate_point_max')) as $i)
                                        <option
                                            value="{!! $i !!}"
                                            {!! ceil($book->avg_rate_point) == $i ? 'selected="selected"' : '' !!}
                                        ></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="book-board-description">
                        <div class="col-md-6">
                            <div class="col-sm-offset-1 board-description">
                                <div style="text-align: center; margin-top:5px;">
                                    <i class="fa fa-2x fa-cog" aria-hidden="true" style="color: black;"></i>
                                </div>
                                <div class="description-content" style="margin-left: 10px;">
                                    <h5 style="font-size: 1.4em; color: white;">
                                        {{ $book->description }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-book-review">
        @if (count($reviews))
            @foreach($reviews as $review)
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="item-review" data-review-id="{{ $review->id }}">
                    <?php $pos = strpos($review->content, '.', trans('review.limit_summary')); ?>
                        <article class="post-summary">
                            {!! substr($review->content, 0, $pos) !!}
                        </article>
                        <a href="{{ route('reviews.show', $review->id) }}" class="button-round button-continue">{{ trans('book.continue_reading') }}</a>
                        <hr>
                        <ul class="post-info-wrapper list-inline">
                            <li class="post-info">{{ trans('user.review.writed_at', ['time' => $review->created_at]) }}</li>
                            <li class="post-info">|</li>
                            <li>
                                <a href="{{ route('users.show', ['id' => $review->user->id]) }}" class="post-info when-link">
                                    <span class="user-name">{{ trans('user.write', ['name' => $review->user->name]) }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="text-center">
        {!! $reviews->links() !!}
    </div>
</div>
@endsection
