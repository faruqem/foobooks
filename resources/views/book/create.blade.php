@extends('layouts.master')

@section('title')
    Book index
@endsection


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    <link href="/css/books/show.css" type='text/css' rel='stylesheet'>
@endsection

@section('content')
        <h1>Enter a book name:</h1>
        <form method="GET" action="/books/create" >
            <label>Title: <input type="text" name="title"></label>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit">
        </form>
@endsection


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <script src="/js/books/show.js"></script>
@endsection
