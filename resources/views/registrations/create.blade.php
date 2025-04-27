@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Tambah Pendaftaran Pasien</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('registrations.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="patient_id" class="form-label">Nama Pasien</label>
                            <select name="patient_id" id="patient_id" class="form-control" required>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }} : {{ $patient->province_id . '-' . $patient->city_id . '-' . $patient->district_id . '-' . $patient->village_id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="patient_category_id" class="form-label">Kategori Pasien</label>
                            <select name="patient_category_id" id="patient_category_id" class="form-control" required>
                                @foreach($patientCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Karyawan</label>
                            <select name="employee_id" id="employee_id" class="form-control" required>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="room_id" class="form-label">Ruangan</label>
                            <select name="room_id" id="room_id" class="form-control" required>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="insurance_number" class="form-label">Nomor Asuransi</label>
                            <input type="text" name="insurance_number" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal Pendaftaran</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="is_inpatient" class="form-label">Rawat Inap</label>
                            <select name="is_inpatient" class="form-control" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
