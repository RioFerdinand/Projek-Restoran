@extends('admin.layout')

@section('manajer')
active
@endsection

@section('content')

<!-- Table -->
<div class="container">
    <div class="row mb-3">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
            <a class="btn btn-danger" href="{{ route('manajer.create') }}"><b>Add +</b></a>
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
                  <th scope="col">Username</th>
                  <th scope="col">Password</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              @foreach ($manajer as $m)
              <tbody>
                  <td>{{ $m->username }}</td>
                  <td>{{ $m->password }}</td>
                  <td>
                      <form action="{{ route('manajer.destroy',$m->id) }}" method="POST">

                          <a class="btn btn-success" href="{{ route('manajer.edit',$m->id) }}">Edit</a>

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

{!! $manajer->links() !!}

@endsection