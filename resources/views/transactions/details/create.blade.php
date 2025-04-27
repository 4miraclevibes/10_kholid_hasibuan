@extends('layouts.main')

@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Tambah Detail Transaksi</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('transactions.details.store', $transaction->id) }}" method="POST">
        @csrf
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="action_id">Tindakan</label>
          <div class="col-sm-10">
            <select name="action_id" id="action_id" class="form-control" required>
              @foreach($actions as $action)
                <option value="{{ $action->id }}">{{ $action->action }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="dpjp">DPJP</label>
          <div class="col-sm-10">
            <select name="dpjp" id="dpjp" class="form-control" required>
              @foreach($employees as $employee)
                <option value="{{ $employee->name }}">{{ $employee->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="quantity">Jumlah</label>
          <div class="col-sm-10">
            <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Jumlah" required>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-sm btn-dark mt-3">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- / Content -->

@endsection
