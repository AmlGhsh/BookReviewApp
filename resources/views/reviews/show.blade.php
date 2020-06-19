{{--This is used to display a particular review. User can edit or delete the selected review from this page.--}}
@extends('layouts/app')
@section('content')
    {{-- <a class="btn btn-default" href="/dashboard">Back to Dashboard</a>
    <a class="btn btn-default pull-right" href="/reviews" role="button">Back to All Reviews</a> --}}
     
    <div class="well">
        <h3>{{$rev->title}}</h3>
        <h5>{!!$rev->body!!}</h5>
        <br>
        <h5>Written by: {{$rev->user->name}}</h5>
        <h5>On the book:<strong>{{$rev->book->title}}</strong></h5>
        <h5>Auhtor:<strong>{{$rev->book->author}}</strong></h5>
        <h6>Last updated at:{{$rev->updated_at}}</h6>
    </div>
    @auth
        @if(Auth::user()->id == $rev->user_id)
            <a class="btn btn-primary" href="/reviews/{{$rev->id}}/edit">Edit</a>
            {{-- The form below is used to delete the particular review from the database
             --}}
            {!!Form::open(['action' => ['ReviewsController@destroy',$rev->id],'method' => 'POST','class'=>'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
        <a class="btn btn-default" href="/dashboard" role="button">Go Back</a>
    @else
        <a class="btn btn-default" href="/reviews" role="button">Go Back</a>
    @endauth 
@endsection