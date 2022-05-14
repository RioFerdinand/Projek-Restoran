@extends('manajer.layout')

@section('menu')
active
@endsection

@section('content')

<!-- Table -->
<div class="container">
    <div class="row mb-3">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
            <a class="btn btn-danger" href="{{ route('menu.create') }}"><b>Add +</b></a>
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
                  <th scope="col">Nama Menu</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              @foreach ($menu as $m)
              <tbody>
                  <td>{{ $m->nama_menu }}</td>
                  <td>{{ $m->harga }}</td>
                  <td>{{ $m->deskripsi }}</td>
                  <td>
                      <form action="{{ route('menu.destroy',$m->id) }}" method="POST">

                          <a class="btn btn-success" href="{{ route('menu.edit',$m->id) }}">Edit</a>

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

{!! $menu->links() !!}

@endsection