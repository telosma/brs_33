@extends('layouts.usermaster')

@section('content')

<div class="container">
    @include('includes.notification')
    @include('includes.error')
    <div class="row preview-book">
        <div class="col-md-3 book-img pull-left">
            <img src="{{ $book->book_image }}" alt="book-img">
        </div>
        <div class="col-md-9 description-book">
            <div class="row">
                <h3>{{ $book->title }}</h3>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <strong>{{ trans('book.author') }}</strong>
                </div>
                <div class="col-sm-6">
                    <p>{{ $book->author }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <strong>{{ trans('book.published_at') }}</strong>
                </div>
                <div class="col-sm-6">
                    <p>{{ $book->published_at }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <strong>{{ trans('book.num_page') }}</strong>
                </div>
                <div class="col-sm-6">
                    <p>{{ $book->num_page }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-review col-md-6">
            {{ Form::open(['route' => 'reviews.store', 'method' => 'post']) }}
                {!! Form::textarea('content', null, ['id' => 'rv-content']) !!}
                {{ Form::hidden('book_id', $book->id) }}
                {{ Form::hidden('user_id', Auth::user()->id) }}
                {{ Form::submit(trans('user.review.post'), [
                    'class' => 'btn btn-success pull-right rv-submit',
                ]) }}
            {{ Form::close() }}
        </div>
        <div class="col-md-6" id="live-editor" style="height: 300px; overflow: scroll; border: 2px solid black;">
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script type="text/javascript">
    tinymce.init({
        selector: '#rv-content',
        selection_toolbar: 'bold italic | quicklink h2 h3',
        menubar: false,
        plugins: 'link',
        toolbar: 'fontsizeselect bold italic | h2 | blockquote alignleft aligncenter alignright alignfull',
        fontsize_formats: "12pt 14pt 18pt",
        setup : function(ed) {
            ed.on('keyup change', function(){
                $('#live-editor').html(tinymce.activeEditor.getContent());
            });
        }
    });
</script>

@endsection
