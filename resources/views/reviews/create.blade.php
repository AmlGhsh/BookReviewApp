{{--This is the create page used to create a new review.--}}
@extends('layouts/app')

@section('content')
    <h3>Create Review:</h3>
    {!!Form::open(['action' => 'ReviewsController@store','method' => 'POST'])!!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class' => 'form-control','placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('book','On the Book')}}
            {{Form::text('book','',['class' => 'form-control','placeholder' => 'Book'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['class'=>"form-control",'placeholder'=>"Review"])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection