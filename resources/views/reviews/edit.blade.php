{{--This is the edit page used to edit a new review.--}}
@extends('layouts/app')

@section('content')
    @auth
        <a class="btn btn-default" href="/dashboard" role="button">Go Back</a>
    @else
        <a class="btn btn-default" href="/reviews" role="button">Go Back</a>
    @endauth
    
    <h3>Update Review:</h3>
    {!!Form::open(['action' => ['ReviewsController@update',$rev->id],'method' => 'POST'])!!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$rev->title,['class' => 'form-control','placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body',$rev->body,['class'=>"form-control",'placeholder'=>"Review"])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection