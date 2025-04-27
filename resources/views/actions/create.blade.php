@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Tambah Action</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('actions.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-action">Nama Tindakan</label>
          <div class="col-sm-10">
            <input type="text" name="action" class="form-control" id="basic-default-action" placeholder="Nama Tindakan" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-code">Kode ICD</label>
          <div class="col-sm-10">
            <input type="text" name="code_icd" class="form-control" id="basic-default-code" placeholder="Kode ICD" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-price">Harga</label>
          <div class="col-sm-10">
            <input type="number" name="price" class="form-control" id="basic-default-price" placeholder="Harga Tindakan" />
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
