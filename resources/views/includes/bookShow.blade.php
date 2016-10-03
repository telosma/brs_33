<div class="col-sm-4">
    <div class="panel panel-default book-content" data-book-id="{!! $book->id !!}">
        <div class="panel-body">
            <div class="book-top" style="width: 100%">
                <i class="fa {!! empty($book->favorites[0])? 'fa-bookmark-o': 'fa-bookmark' !!} book-favorite"
                    aria-hidden="true"
                ></i>
                <div class="fa-pull-right dropdown" style="color: tomato; cursor: pointer">
                    <div class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa {!!
                            empty($book->marks[0]) ?
                                '' :
                                ($book->marks[0]->action == config('common.read') ? 'fa-file-text' : 'fa-file-text-o')
                        !!}" aria-hidden="true"></i>&nbsp;
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                    <ul class="dropdown-menu menu-mark">
                        <li data-mark="{!! config('common.reading') !!}">
                            {!! trans('book.mark_as.reading') !!}
                            <i class="fa fa-file-text-o fa-pull-right" aria-hidden="true"></i>
                        </li>
                        <li data-mark="{!! config('common.read') !!}">
                            {!! trans('book.mark_as.read') !!}
                            <i class="fa fa-file-text fa-pull-right" aria-hidden="true"></i>
                        </li>
                        <li data-mark="">
                            {!! trans('book.mark_as.null') !!}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="book-image">
                <img src="{!! $book->book_image !!}"/>
            </div>
            <div class="book-detail">
                <div style="font-weight: 900; color: blue; font-size: 1.2em; margin-bottom: 0.2em">
                    <a href="{{ route('book.show', ['id' => $book->id]) }}">{!! $book->title !!}</a>
                </div>
                <div style="color: #008340; margin-bottom: 0.1em">{!! $book->author !!}</div>
                <div style="margin-bottom: 0.3em"><em>{!! $book->published_at !!}</em></div>
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
    </div>
</div>
