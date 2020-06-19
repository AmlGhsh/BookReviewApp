@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if ($message=Session::get('success'))
    <div class="alert alert-success">
        <strong>{{$message}}</strong>
    </div>
@endif

@if ($message=Session::get('error'))
    <div class="alert alert-danger">
        <strong>{{$message}}</strong>
    </div>
@endif