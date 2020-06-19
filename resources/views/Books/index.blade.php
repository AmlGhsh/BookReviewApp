@extends('layouts/app')
@section('content')
    <div class="container">
        <h2>Books</h2>
        <br>
        <br>
        @if (count($books)>0)
            @foreach ($books as $book)
                <ul class="list-group">
                    <li class="list-group-item"><a href="/books/{{$book->id}}/">{{$book->title}}</a></li>
                </ul>
            @endforeach
            {{$books->links()}}
        @endif
        @auth
        <a href="/books/create" class="btn btn-primary">Add Books</a>
        <br>
        <br>
    @endauth
    </div>
@endsection