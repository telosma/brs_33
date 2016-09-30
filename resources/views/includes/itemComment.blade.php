<div class="item-comment clear-fix">
    <div class="user-info">
        <img class="user-ava" src="{{ $comment->user->avatar_link }}"></img>
        <div class="user-name">
            <h4>{{ $comment->user->name }}</h4>
            <p class="comment-time">
                {{ trans('user.created_at', ['time' => $comment->created_at]) }}
            </p>
        </div>
        <div class="comment-body" id="{{ $comment->id }}">
            <span>{{ $comment->content }}</span>
            <div class="dropdown">
                <i class="fa sm fa-pencil" class="dropdown-toggle" data-toggle="dropdown" aria-hidden="true">
                </i>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#">{{ trans('user.edit') }}</a>
                    </li>
                    <li class="devider"></li>
                    <li>
                        <a href="#">{{ trans('user.delete') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
