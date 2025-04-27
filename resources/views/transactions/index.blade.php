@extends('layouts.main')

@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">
      Daftar Transaksi 
      <a href="{{ route('transactions.create') }}" class="btn btn-sm btn-success">Tambah Transaksi</a>
    </h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Pasien</th>
            <th class="text-white">Pegawai</th>
            <th class="text-white">Tanggal Transaksi</th>
            <th class="text-white">Checkin</th>
            <th class="text-white">Checkout</th>
            <th class="text-white">Lama Dirawat</th>
            <th class="text-white">Total Harga</th>
            <th class="text-white">Status</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $transaction)
          <tr>
            @php
            $checkin = \Carbon\Carbon::parse($transaction->checkin_date);
            $checkout = \Carbon\Carbon::parse($transaction->checkout_date);
            $days_treated = $checkin->diffInDays($checkout);
            @endphp
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $transaction->registration->patient->name ?? '-' }}</td>
            <td>{{ $transaction->employee->name ?? '-' }}</td>
            <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d/m/Y') }}</td>
            <td>{{ $transaction->checkin_date ? \Carbon\Carbon::parse($transaction->checkin_date)->format('d M Y') : '-' }}</td>
            <td>{{ $transaction->checkout_date ? \Carbon\Carbon::parse($transaction->checkout_date)->format('d M Y') : '-' }}</td>
            <td>{{ $days_treated == 0 ? 'Rajal' : $days_treated }}</td>
            @if ($transaction->status  == 'paid')
            <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
            @else
            <td>Rp {{ number_format($transaction->transactionDetail->sum('total_price') + ($transaction->registration->room->price * $days_treated), 0, ',', '.') }}</td>
            @endif
            <td>{{ ucfirst($transaction->status) }}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('transactions.details.index', $transaction->id) }}">
                    <i class="bx bx-info-circle me-1"></i>Detail
                  </a>
                  @if ($transaction->status !== 'paid')
                  <a class="dropdown-item" href="{{ route('transactions.edit', $transaction->id) }}">
                    <i class="bx bx-edit-alt me-1"></i>Edit
                  </a>
                  @endif
                  <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?');">
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
