@extends('layouts/app')
@section('content')
    <div class="panel panel-group">
        <div class="panel panel-default">
            <div class="panel panel-heading"><h2>Reviews</h2></div>
            <div class="panel panel-body">
                @if (count($revs)>0)
                    @foreach ($revs as $rev)
                        <div class="well">
                            <h3><a href="/reviews/{{$rev->id}}">{{$rev->title}}</a></h4>
                            <h4>On:{{$rev->book->title}}</h4>
                            <h5>Written by: {{$rev->user->name}}</h5>
                            <h6>Last updated at:{{$rev->updated_at}}</h6>
                        </div>
                    @endforeach
                    {{$revs->links()}}
                @else
                    <p>No reviews found.</p>
                @endif
            </div>
        </div>
    </div> 
    <br>
    <br>
    <a href="\reviews\create" class="btn btn-primary">Add Reviews</a>
@endsection