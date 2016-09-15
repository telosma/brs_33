@extends('layouts.usermaster')

@section('navbar-top')

@include('includes.header')

@endsection

@section('content')
<aside class="sidebar">
    <nav class="sidebar-nav">
        <ul class="metismenu" id="menu">
            <a href="#" aria-expanded="true">
                <span class="sidebar-nav-item-icon fa fa-book fa-lg"></span>
                <span class="sidebar-nav-item">{{ trans('label.category') }}</span>
                <span class="fa arrow fa-fw"></span>
            </a>
            <li>
                <a href="#" aria-expanded="false">
                    Ruby Book
                    <span class="fa arrow fa-fw"></span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="#">item 0.1</a></li>
                    <li><a href="#">item 0.2</a></li>
                    <li><a href="#">item 0.4</a></li>
                </ul>
            </li>
            <li>
                <a href="#" aria-expanded="false">
                    Ruby book
                    <span class="glyphicon arrow"></span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="#">item 1.1</a></li>
                    <li><a href="#">item 1.2</a></li>
                    <li>
                        <a href="#" aria-expanded="false"> 11 <span class="fa plus-times"></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="#">item 1.3.1</a></li>
                            <li><a href="#">item 1.3.2</a></li>
                            <li><a href="#">item 1.3.3</a></li>
                            <li><a href="#">item 1.3.4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">item 1.4</a></li>
                    <li>
                        <a href="#" aria-expanded="false">Menu 1.5 <span class="fa plus-minus"></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="#">item 1.5.1</a></li>
                            <li><a href="#">item 1.5.2</a></li>
                            <li><a href="#">item 1.5.3</a></li>
                             <li><a href="#">item 1.5.4</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" aria-expanded="false"> PHP book <span class="glyphicon arrow"></span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="#">item 2.1</a></li>
                    <li><a href="#">item 2.2</a></li>
                    <li><a href="#">item 2.3</a></li>
                    <li><a href="#">item 2.4</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
<header class="header-container" style="margin-left:300px;">
    <h1>
        <b>{{ trans('label.brand') }}</b>
    </h1>
    <div class="section bottombar padding-16">
        <span class="margin-right">{{ trans('label.filter') }}:</span> 
        <button class="btn">
            <i class="fa fa-book margin-right"></i>
            {{ trans('label.all') }}
        </button>
        <button class="btn white">
            <i class="fa fa-diamond margin-right"></i>
            {{ trans('label.category') }}
        </button>
        <button class="btn white hide-small">
            <i class="fa fa-star-o"></i>
            {{ trans('label.rate') }}
        </button>
        <button class="btn white hide-small">
            <i class="fa fa-map-pin margin-right"></i>
            {{ trans('label.favorite') }}
        </button>
    </div>
</header>
<div class="container">
    <div class="item-list-sm" style="margin-left: 250px;">
        <ul class="row book-list">
            <li>
                <div class="col-md-2">
                    <img data-hover-preview="http://nhanam.vn/sites/default/files/chandikhongmoi_1.6cm-01.jpg" class="hover-preview-imgpreview hover-preview hover-preview-imgpreview-processed" src="http://nhanam.vn/sites/default/files/styles/sach_moi_117x174/public/chandikhongmoi_1.6cm-01.jpg?itok=KtT3Xbfj" alt="">
                </div>
                <div class="col-md-2">
                    <div>
                        <div>
                            <b><a href="/sach/chan-di-khong-moi">Chân đi không mỏi</a></b>
                        </div>
                        <div>
                            <b> {{ trans('label.author') }}: </b>
                            <a href="/tac-gia/dinh-hang">Đinh Hằng</a>
                        </div>
                        <div>
                            <b>{{ trans('label.numpage') }}: </b>
                            282
                        </div>
                        <div>
                            <b>{{ trans('label.publish') }}: </b>
                            <span class="date-display-single">11-09-2016</span>
                        </div>
                        <div>
                            <select class="start-barrating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <a href="#">5 reviews</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="col-md-2">
                    <img data-hover-preview="http://nhanam.vn/sites/default/files/chandikhongmoi_1.6cm-01.jpg" class="hover-preview-imgpreview hover-preview hover-preview-imgpreview-processed" src="http://nhanam.vn/sites/default/files/styles/sach_moi_117x174/public/chandikhongmoi_1.6cm-01.jpg?itok=KtT3Xbfj" alt="">
                </div>
                <div class="col-md-2">
                    <div>
                        <div>
                            <b><a href="/sach/chan-di-khong-moi">Chân đi không mỏi</a></b>
                        </div>
                        <div>
                            <b>{{ trans('label.author') }}: </b>
                            <a href="/tac-gia/dinh-hang">Đinh Hằng</a>
                        </div>
                        <div>
                            <b>{{ trans('label.numpage') }}: </b>
                            282
                        </div>
                        <div>
                            <b>{{ trans('label.publish') }}: </b>
                            <span class="date-display-single">11-09-2016</span>
                        </div>
                        <div>
                            <select class="start-barrating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <a href="#">5 reviews</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="col-md-2">
                    <img data-hover-preview="http://nhanam.vn/sites/default/files/chandikhongmoi_1.6cm-01.jpg" class="hover-preview-imgpreview hover-preview hover-preview-imgpreview-processed" src="http://nhanam.vn/sites/default/files/styles/sach_moi_117x174/public/chandikhongmoi_1.6cm-01.jpg?itok=KtT3Xbfj" alt="">
                </div>
                <div class="col-md-2">
                    <div>
                        <div>
                            <b><a href="/sach/chan-di-khong-moi">Chân đi không mỏi</a></b>
                        </div>
                        <div>
                            <b>{{ trans('label.author') }}: </b>
                            <a href="/tac-gia/dinh-hang">Đinh Hằng</a>
                        </div>
                        <div>
                            <b>{{ trans('label.numpage') }}: </b>
                            282
                        </div>
                        <div>
                            <b>{{ trans('label.publish') }}: </b>
                            <span class="date-display-single">11-09-2016</span>
                        </div>
                        <div>
                            <select class="start-barrating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <a href="#">5 reviews</a>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="row book-list">
            <li>
                <div class="col-md-2">
                    <img data-hover-preview="http://nhanam.vn/sites/default/files/chandikhongmoi_1.6cm-01.jpg" class="hover-preview-imgpreview hover-preview hover-preview-imgpreview-processed" src="http://nhanam.vn/sites/default/files/styles/sach_moi_117x174/public/chandikhongmoi_1.6cm-01.jpg?itok=KtT3Xbfj" alt="">
                </div>
                <div class="col-md-2">
                    <div>
                        <div>
                            <b><a href="/sach/chan-di-khong-moi">Chân đi không mỏi</a></b>
                        </div>
                        <div>
                            <b>{{ trans('label.author') }}: </b>
                            <a href="/tac-gia/dinh-hang">Đinh Hằng</a>
                        </div>
                        <div>
                            <b>{{ trans('label.numpage') }}: </b>
                            282
                        </div>
                        <div>
                            <b>{{ trans('label.publish') }}: </b>
                            <span class="date-display-single">11-09-2016</span>
                        </div>
                        <div>
                            <select class="start-barrating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <a href="#">5 reviews</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="col-md-2">
                    <img data-hover-preview="http://nhanam.vn/sites/default/files/chandikhongmoi_1.6cm-01.jpg" class="hover-preview-imgpreview hover-preview hover-preview-imgpreview-processed" src="http://nhanam.vn/sites/default/files/styles/sach_moi_117x174/public/chandikhongmoi_1.6cm-01.jpg?itok=KtT3Xbfj" alt="">
                </div>
                <div class="col-md-2">
                    <div>
                        <div>
                            <b><a href="/sach/chan-di-khong-moi">Chân đi không mỏi</a></b>
                        </div>
                        <div>
                            <b>{{ trans('label.author') }}: </b>
                            <a href="/tac-gia/dinh-hang">Đinh Hằng</a>
                        </div>
                        <div>
                            <b>{{ trans('label.numpage') }}: </b>
                            282
                        </div>
                        <div>
                            <b>{{ trans('label.publish') }}: </b>
                            <span class="date-display-single">11-09-2016</span>
                        </div>
                        <div>
                            <select class="start-barrating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <a href="#">5 reviews</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="col-md-2">
                    <img data-hover-preview="http://nhanam.vn/sites/default/files/chandikhongmoi_1.6cm-01.jpg" class="hover-preview-imgpreview hover-preview hover-preview-imgpreview-processed" src="http://nhanam.vn/sites/default/files/styles/sach_moi_117x174/public/chandikhongmoi_1.6cm-01.jpg?itok=KtT3Xbfj" alt="">
                </div>
                <div class="col-md-2">
                    <div>
                        <div>
                            <b><a href="/sach/chan-di-khong-moi">Chân đi không mỏi</a></b>
                        </div>
                        <div>
                            <b>{{ trans('label.author') }}: </b>
                            <a href="/tac-gia/dinh-hang">Đinh Hằng</a>
                        </div>
                        <div>
                            <b>{{ trans('label.numpage') }}: </b>
                            282
                        </div>
                        <div>
                            <b>{{ trans('label.publish') }}: </b>
                            <span class="date-display-single">11-09-2016</span>
                        </div>
                        <div>
                            <select class="start-barrating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <a href="#">5 reviews</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<nav aria-label="Page navigation" style="text-align:center;">
    <ul class="pagination">
        <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
            <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
@endsection
