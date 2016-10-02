<div class="item-comment clear-fix" id="item-comment-{{ $comment->id }}">
    <div class="user-info">
        <img class="user-ava" src="{{ $comment->user->avatar_link }}"></img>
        <div class="user-name">
            <h4>{{ $comment->user->name }}</h4>
            <p class="comment-time">
                {{ trans('user.created_at', ['time' => $comment->created_at]) }}
            </p>
        </div>
        <div class="comment-body">
            <span>{{ $comment->content }}</span>
            @if (Auth::user()->id === $comment->user->id)
                <div class="dropdown" data-comment-id="{{ $comment->id }}" data-review-id="{{ $comment->review->id }}">
                    <i class="fa sm fa-pencil dropdown-toggle" data-toggle="dropdown" aria-hidden="true">
                    </i>
                    <ul class="dropdown-menu">
                        <li>
                            <button>{{ trans('user.edit') }}</button>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <button id="btn-delete-comment" data-toggle="modal" data-target="#delete-cmt-modal">{{ trans('user.delete') }}</button>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
