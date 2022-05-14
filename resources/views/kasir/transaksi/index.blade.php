@extends('kasir.layout')

@section('transaksi')
active
@endsection

@section('content')

<!-- Table -->
<div class="container">
    <div class="row mb-3">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
            <a class="btn btn-danger" href="{{ route('transaksi.create') }}"><b>Add +</b></a>
          </div>
        <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                  <th scope="col">Nama Pelanggan</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Harga Satuan</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Total</th>
                  <th scope="col">Nama Pegawai</th>
                  <th scope="col">Aksi</th>
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
                  <td>
                      <form action="{{ route('transaksi.destroy',$t->id) }}" method="POST">

                          <a class="btn btn-success" href="{{ route('transaksi.edit',$t->id) }}">Edit</a>

                          @csrf
                          @method('DELETE')

                          <button type="submit" class="btn btn-primary">Delete</button>
                      </form>
                  </td>
                </tbody>
              @endforeach
              
        </table>
    </div>
</div>
<!-- Table -->

{!! $transaksi->links() !!}

@endsection