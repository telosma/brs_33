@extends('layouts.bookMaster')

@section('body_title', $bodyTitle)

@section('body')
@foreach($books as $book)
    @include('includes.bookShow')
@endforeach
<div class="col-lg-12">
    {!! $books->render() !!}
</div>
@endsection
