@extends('layouts.main')

@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">
      Table Rooms 
      <a href="{{ route('rooms.create') }}" class="btn btn-sm btn-success">Tambah Room</a>
    </h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Nama Room</th>
            <th class="text-white">Harga</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rooms as $room)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $room->name }}</td>
            <td>Rp {{ number_format($room->price, 0, ',', '.') }}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('rooms.edit', $room->id) }}">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                  </a>
                  <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?');">
                    @csrf
                    @method('DELETE')
                    <button class="dropdown-item" type="submit">
                      <i class="bx bx-trash me-1"></i> Delete
                    </button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- / Content -->

@endsection
