@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Tambah Transaksi</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="registration_id">Pasien</label>
          <div class="col-sm-10">
            <select name="registration_id" id="registration_id" class="form-control" required>
              <option value="">-- Pilih Pasien --</option>
              @foreach($registrations as $registration)
                <option value="{{ $registration->id }}">
                  {{ $registration->patient->name ?? 'Pasien Tidak Ditemukan' }} -  {{ $registration->patient->province_id . '-' . $registration->patient->city_id . '-' . $registration->patient->district_id . '-' . $registration->patient->village_id }}
                </option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="date">Tanggal Transaksi</label>
          <div class="col-sm-10">
            <input type="date" name="date" id="date" class="form-control" required />
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="checkin_date">Check-in</label>
          <div class="col-sm-10">
            <input type="datetime-local" name="checkin_date" id="checkin_date" class="form-control" />
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="checkout_date">Check-out</label>
          <div class="col-sm-10">
            <input type="datetime-local" name="checkout_date" id="checkout_date" class="form-control" />
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="status">Status</label>
          <div class="col-sm-10">
            <select name="status" id="status" class="form-control" required>
              <option value="pending" >Pending</option>
              <option value="unpaid" >Unpaid</option>
              <option value="paid" >Paid</option>
            </select>
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
