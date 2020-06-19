{{-- This is the default home page. It is displayed as the home page when a user is not logged in. --}}
@extends('layouts/app')

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome to Book Review App</h1>
    <p>This is the home page.</p>
    {{-- <p><a class="btn btn-primary btn-lg" href="/login" role="button">Log in</a>    <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p> --}}
</div>
@endsection