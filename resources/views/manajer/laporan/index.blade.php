@extends('manajer.layout')

@section('content')

    <!-- Table -->
    <div class="container">
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <form action="{{ url()->current() }}" method="get">
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="filter">
                        <button class="btn btn-danger" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

            <table class="table table-striped table-hover mt-3">
                <thead>
                    <tr>
                      <th scope="col">Nama Pelanggan</th>
                      <th scope="col">Menu</th>
                      <th scope="col">Harga Satuan</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Total</th>
                      <th scope="col">Nama Pegawai</th>
                    </tr>
                  </thead>
                  @foreach ($transaksi as $t)
                  <tbody>
                        <td>{{ $t->nama_pelanggan }}</td>
                        <td>{{ $t->menu->nama_menu }}</td>
                        <td>{{ $t->menu->harga }}</td>
                        <td>{{ $t->jumlah }}</td>
                        <td>{{ $t->menu->harga * $t->jumlah }}</td>
                        <td>{{ $t->nama_pegawai }}</td>
                    </tbody>
                  @endforeach
                  
            </table>
        </div>
    </div>
    <!-- Table -->

@endsection