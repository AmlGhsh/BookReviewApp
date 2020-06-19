{{--This is the create page used to create a new review.--}}
@extends('layouts/app')

@section('content')
    <h3>Update book:</h3>
    {!!Form::open(['action' => ['BooksController@update',$book->id],'method' => 'POST'])!!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$book->title,['class' => 'form-control','placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('author','Auhtor')}}
            {{Form::text('author',$book->author,['class'=>"form-control",'placeholder'=>"Author"])}}
        </div>
        <div class="form-group">
            {{Form::label('publisher','Publisher')}}
            {{Form::text('publisher',$book->publisher,['class'=>"form-control",'placeholder'=>"Publisher"])}}
        </div>
        <div class="form-group">
            {{Form::label('language','Language')}}
            {{Form::text('language',$book->language,['class'=>"form-control",'placeholder'=>"Language"])}}
        </div>
        <div class="form-group">
            {{Form::label('genre','Genre')}}
            {{Form::text('genre',$book->genre,['class'=>"form-control",'placeholder'=>"Genre"])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection