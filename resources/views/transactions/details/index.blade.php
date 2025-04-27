@extends('layouts.main')

@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">
      Daftar Detail Transaksi 
      <a href="{{ route('transactions.details.create', $transaction->id) }}" class="btn btn-sm btn-success">Tambah Detail</a>
    </h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Tindakan</th>
            <th class="text-white">DPJP</th>
            <th class="text-white">Jumlah</th>
            <th class="text-white">Total Harga</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transactionDetails as $detail)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $detail->action->action ?? '-' }}</td>
            <td>{{ $detail->dpjp ?? '-' }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>Rp {{ number_format($detail->total_price, 0, ',', '.') }}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('transactions.details.edit', [$transaction->id, $detail->id]) }}">
                    <i class="bx bx-edit-alt me-1"></i>Edit
                  </a>
                  <form action="{{ route('transactions.details.destroy', [$transaction->id, $detail->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus detail ini?');">
                    @csrf
                    @method('DELETE')
                    <button class="dropdown-item" type="submit">
                      <i class="bx bx-trash me-1"></i>Delete
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
