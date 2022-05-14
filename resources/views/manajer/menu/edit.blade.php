@extends('manajer.layout')

@section('menu')
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

<form action="{{ route('menu.update',$menu->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')

    <div class="row mt-5">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Nama Menu:</strong>
                <input type="text" name="nama_menu" class="form-control" placeholder="Nama Menu" value="{{$menu->nama_menu}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Harga:</strong>
                <input type="text" name="harga" class="form-control" placeholder="Harga" value="{{$menu->harga}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="{{$menu->deskripsi}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </div>

</form>
@endsection