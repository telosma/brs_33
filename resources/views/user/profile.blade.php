@extends('layouts.usermaster')

@section('header')

@include('includes.header')

@endsection

@section('content')

<div class="container box-profile">
    <div class="row">
        <div class="avatar">
            <a href="{{ route('users.show', $userInfo->id) }}">
                <img src="{{ asset(config('upload.image_upload') . $userInfo->avatar_link) }}" alt="avatar" style="float: left;">
            </a>
        </div>
        <div class="col-md-6 col-lg-6 content-profile">
            <p class="name-profile">{{ $userInfo->name }}</p>
            @if (Auth::check())
                @if (Auth::user()->id == $userInfo->id)
                    <a href="{{ route('getEditProfile') }}" class="btn btn-edit pull-right">{{ trans('user.profile.edit') }}</a>
                @else
                    <button class="btn btn-edit btn-follow pull-right">{{ trans('user.profile.follow') }}</button>
                @endif
            @endif
        </div>
        <div class="col-md-4 col-lg-4 box-info-like">
            <a href="#">
                <p class="col-md-8">{{ trans('user.profile.review') }}</p>
                <p class="col-md-4">0</p>
            </a>
            <a href="#">
                <p class="col-md-8">{{ trans('user.profile.following') }}</p>
                <p class="col-md-4">10</p>
            </a>
            <a href="#">
                <p class="col-md-8">{{ trans('user.profile.follower') }}</p>
                <p class="col-md-4">4</p>
            </a>
        </div>
    </div>
</div>
<div class="row col-lg-12 box-title box-title-children">
    <ul class="list-title">
        <li>
            <a href="#" class="selected">{{ trans('user.profile.post_review') }}</a>
        </li>
    </ul>
</div>
<div class="container">
    <div class="row box-review">
        <div class="col-lg-12">
            <div class="pre-review-post">
                <div class="box-top">
                    <a href="#">
                        <img src="http://nhanam.vn/sites/default/files/styles/sach_moi_117x174/public/chandikhongmoi_1.6cm-01.jpg?itok=KtT3Xbfj" alt="book img">
                    </a>
                    <div class="pre-footer-review-post">
                        <span>5 {{ trans('user.profile.reviews') }}</span>
                    </div>
                </div>
                <div class="pre-review">
                    <div class="pre-title-review">This is title</div>
                    <div class="pre-author-review">
                        <a href="{{ route('users.show', $userInfo->id) }}" class="author-link-profile">
                            <span>{{ $userInfo->name }}</span>
                        </a>
                        <div class="mini-date">
                            <span>{{ trans('label.posted') }}</span>
                            <span>19/09/2016</span>
                        </div>
                    </div>
                    <p class="pre-detail break-word">
                        Chân đi không mỏi: Hành trình Đông Nam Á là những trải nghiệm tinh tế, giàu cảm xúc và tràn đầy sức sống của một tâm hồn tự do trên khắp các vùng đất Đông Nam Á. Từng trang sách sẽ "mê hoặc" người đọc trong cảm giác tưởng chừng như cái nắng cháy da trên đảo Koh Samui (Thái Lan) đang đốt trên cánh tay, bình minh trên đỉnh Ramelau (Đông Timor) đang chiếu ngời khuôn mặt, những ánh tàn cuối ngày của Kuta (Bali, Indonesia) vẫn còn nhuộm vàng mặt biển, hay tưởng như những đàn cá mập dưới đáy biển Sipadan (Sabah, Malaysia) vẫn đang kiêu kỳ rẽ nước ngay trên bình dưỡng khí lặn, rồi còn những khi lái thuyền lao thẳng vào một ghềnh nước trên sông Nam Tha (Luang Nam Tha, Lào), rồi những đêm uống bia trên bãi biển El Nido (Philippines,)…
                    </p>
                    <div class="tag"><mark>#aaa</mark></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
