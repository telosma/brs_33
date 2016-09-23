@extends('layouts.adminMaster')

@section('page_title', trans('admin.title_home'))

@section('main_title', trans('admin.list', ['name' => trans('admin.review')]) )

@section('content')
<div id="message"></div>
<table id="table" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th></th>
            <th>{!! trans('review.book') !!}</th>
            <th>{!! trans('review.user') !!}</th>
            <th>{!! trans('review.content') !!}</th>
            <th><i class="fa fa-comments-o" aria-hidden="true"></i></th>
            <th><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>
            <th>{!! trans('review.book') !!}</th>
            <th>{!! trans('review.user') !!}</th>
            <th>{!! trans('review.content') !!}</th>
            <th><i class="fa fa-comments-o" aria-hidden="true"></i></th>
            <th><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>
@endsection

@section('script')
{!! Html::script('js/adminReview.js') !!}
<script type="text/javascript">
    var url = {
        'list': '{!! route('admin.review.ajaxList') !!}',
        'delete': '{!! route('admin.review.ajaxDelete') !!}',
    };
    var lang = {
        'trans': {
            'unknown_error': '{!! trans('dataTable.unknown_error') !!}',
            'confirm_select_all': '{!! trans('dataTable.confirm_select_all') !!}',
            'confirm_delete': '{!! trans('dataTable.confirm_delete') !!}',
        },
        'button_text': {
            'select_page': '{!! trans('dataTable.select_page') !!}',
            'select_all': '{!! trans('dataTable.select_all') !!}',
            'unselect': '{!! trans('dataTable.unselect') !!}',
            'delete_select': '{!! trans('dataTable.delete_select') !!}',
        },
        'response': {
            'key_name': '{!! config('common.flash_level_key') !!}',
            'message_name': '{!! config('common.flash_message') !!}',
        }
    };
    var Review = new review();
    Review.init(url, lang);
</script>
@endsection
