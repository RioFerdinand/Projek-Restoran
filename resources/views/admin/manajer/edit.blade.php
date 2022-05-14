@extends('admin.layout')

@section('manajer')
active
@endsection

@section('content')
<br>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('manajer.update',$manajer->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')

    <div class="row mt-5">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{$manajer->username}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="text" name="password" class="form-control" placeholder="Password" value="">
            </div>
        </div>
        <input type="hidden" name="role" class="form-control" placeholder="Password" value="{{$manajer->role}}">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </div>

</form>
@endsection