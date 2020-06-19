{{-- This is the dashboard page. It is displayed as the home page when a user is logged in. 
        From here user can create a new review or edit/delete all his/her reviews.  --}}
@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Dashboard</h3></div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <h5>Welcome <b>{{ Auth::user()->name }}!</b></h5>
                        <br>
                    
                        @if (count($reviews)>0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach ($reviews as $review)
                                <tr>
                                    <th><a href="/reviews/{{$review->id}}">{{$review->title}}</a></th>
                                    <th><a class="btn btn-primary" href="/reviews/{{$review->id}}/edit">Edit</a></th>
                                    <th>
                                        {!!Form::open(['action' => ['ReviewsController@destroy',$review->id],'method' => 'POST'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!} 
                                    </th>
                                </tr>
                                @endforeach
                            </table>
                        @else
                                <p>You have no reviews.</p>                                
                        @endif

                        <br>
                        <a class="btn btn-primary" href="/reviews/create">Create post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
