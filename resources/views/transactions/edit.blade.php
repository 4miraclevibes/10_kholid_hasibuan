@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Edit Transaksi</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Pendaftaran</label>
          <div class="col-sm-10">
            <select class="form-control" name="registration_id" disabled>
              @foreach($registrations as $registration)
                <option value="{{ $registration->id }}" {{ $transaction->registration_id == $registration->id ? 'selected' : '' }}>
                  {{ $registration->patient->name ?? '-' }} - {{ $registration->date }}
                </option>
              @endforeach
            </select>
            <input type="hidden" name="registration_id" value="{{ $transaction->registration_id }}">
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
          <div class="col-sm-10">
            <input type="date" name="date" value="{{ $transaction->date }}" class="form-control" required>
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Tanggal Check-In</label>
          <div class="col-sm-10">
            <input type="date" name="checkin_date" value="{{ $transaction->checkin_date }}" class="form-control" required>
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Tanggal Check-Out</label>
          <div class="col-sm-10">
            <input type="date" name="checkout_date" value="{{ $transaction->checkout_date }}" class="form-control" required>
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10">
            <select class="form-control" name="status" required>
              <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="unpaid" {{ $transaction->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
              <option value="paid" {{ $transaction->status == 'paid' ? 'selected' : '' }}>Paid</option>
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Total</label>
          @php
            $checkin = \Carbon\Carbon::parse($transaction->checkin_date);
            $checkout = \Carbon\Carbon::parse($transaction->checkout_date);
            $days_treated = $checkin->diffInDays($checkout);
          @endphp
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ number_format($transaction->transactionDetail->sum('total_price') + ($transaction->registration->room->price * $days_treated), 0, ',', '.') }}" disabled>
          </div>
        </div>

        <div class="row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-sm btn-dark mt-3">Kirim</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

@endsection
