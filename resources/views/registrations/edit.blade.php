@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Edit Pendaftaran Pasien</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('registrations.update', $registration->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="patient_id" class="form-label">Nama Pasien</label>
                            <select name="patient_id" id="patient_id" class="form-control" required>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ $patient->id == $registration->patient_id ? 'selected' : '' }}>
                                        {{ $patient->name }} : {{ $patient->province_id . '-' . $patient->city_id . '-' . $patient->district_id . '-' . $patient->village_id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="patient_category_id" class="form-label">Kategori Pasien</label>
                            <select name="patient_category_id" id="patient_category_id" class="form-control" required>
                                @foreach($patientCategories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $registration->patient_category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Karyawan</label>
                            <select name="employee_id" id="employee_id" class="form-control" required>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}" {{ $employee->id == $registration->employee_id ? 'selected' : '' }}>
                                        {{ $employee->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="room_id" class="form-label">Ruangan</label>
                            <select name="room_id" id="room_id" class="form-control" required>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}" {{ $room->id == $registration->room_id ? 'selected' : '' }}>
                                        {{ $room->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="insurance_number" class="form-label">Nomor Asuransi</label>
                            <input type="text" name="insurance_number" class="form-control" value="{{ old('insurance_number', $registration->insurance_number) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal Pendaftaran</label>
                            <input type="date" name="date" class="form-control" value="{{ old('date', $registration->date) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending" {{ $registration->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="process" {{ $registration->status == 'process' ? 'selected' : '' }}>Process</option>
                                <option value="done" {{ $registration->status == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="is_inpatient" class="form-label">Rawat Inap</label>
                            <select name="is_inpatient" class="form-control" required>
                                <option value="1" {{ $registration->is_inpatient == 1 ? 'selected' : '' }}>Ya</option>
                                <option value="0" {{ $registration->is_inpatient == 0 ? 'selected' : '' }}>Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

@endsection
