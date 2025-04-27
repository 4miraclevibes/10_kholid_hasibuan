@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Edit Education</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('educations.update', $education->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Education</label>
          <div class="col-sm-10">
            <input type="text" name="name" value="{{ $education->name }}" class="form-control" id="basic-default-name" placeholder="Nama Education" />
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
