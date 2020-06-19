@extends('layouts/app')
@section('content')
<div class="panel panel-group">
    <div class="panel panel-default">
        <div class="panel-heading"><h2>{{$book->title}}</h2></div>
        <div class="panel-body">
            <h4>Author: {{$book->author}}</h4>
            <br>
            <h4>Published By: {{$book->publisher}}</h4>
            <br>
            <h4>Language: {{$book->language}}</h4>
            <br>
            <h4>Genre: {{$book->genre}}</h4>
        </div>
    </div>
</div>
@auth
    <a class="btn btn-primary" href="/books/{{$book->id}}/edit">Edit Details</a>
@endauth
@endsection