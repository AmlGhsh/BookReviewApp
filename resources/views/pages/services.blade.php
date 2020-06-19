@extends('layouts/app')
@section('content')
    <h1>{{$title}}</h1>
    @if (count($var)>0)
        <ul class="list-group">
        @foreach ($var as $item)
            <li class="list-group-item">{{$item}}</li>   
        @endforeach
        </ul>
    @endif
@endsection