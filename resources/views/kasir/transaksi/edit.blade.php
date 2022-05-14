@extends('kasir.layout')

@section('transaksi')
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

<form action="{{ route('transaksi.update',$transaksi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')

    <div class="row mt-5">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Nama Pelanggan:</strong>
                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" value="{{$transaksi->nama_pelanggan}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Menu:</strong>
                <select class="form-control" name="menu_id">
                    @foreach($menu as $m)
                    <option value="{{$transaksi->menu_id}}" @if($transaksi->menu->nama_menu == $m->nama_menu)selected @endif>{{$m->nama_menu}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Jumlah:</strong>
                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="{{$transaksi->jumlah}}">
            </div>
        </div>
        <input type="hidden" name="nama_pegawai" value="{{ auth()->user()->username }}">
        <input type="hidden" name="tgl" value="{{ date('Y-m-d') }}">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </div>

</form>
@endsection