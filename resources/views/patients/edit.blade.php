@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Edit Pasien</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          
          <!-- Kiri -->
          <div class="col-md-6">
            <!-- Pendidikan -->
            <div class="mb-3">
              <label for="education_id" class="form-label">Pendidikan</label>
              <select name="education_id" id="education_id" class="form-control" required>
                <option value="" disabled {{ $patient->education_id ? '' : 'selected' }}>Pilih Pendidikan</option>
                @foreach ($educations as $education)
                  <option value="{{ $education->id }}" {{ $patient->education_id == $education->id ? 'selected' : '' }}>
                    {{ $education->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <!-- Pekerjaan -->
            <div class="mb-3">
              <label for="employment_id" class="form-label">Pekerjaan</label>
              <select name="employment_id" id="employment_id" class="form-control" required>
                <option value="" disabled {{ $patient->employment_id ? '' : 'selected' }}>Pilih Pekerjaan</option>
                @foreach ($employments as $employment)
                  <option value="{{ $employment->id }}" {{ $patient->employment_id == $employment->id ? 'selected' : '' }}>
                    {{ $employment->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <!-- Nama Pasien -->
            <div class="mb-3">
              <label for="name" class="form-label">Nama Pasien</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ $patient->name }}" required />
            </div>

            <!-- Tempat Lahir -->
            <div class="mb-3">
              <label for="birth_place" class="form-label">Tempat Lahir</label>
              <input type="text" name="birth_place" id="birth_place" class="form-control" value="{{ $patient->birth_place }}" required />
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-3">
              <label for="birth_date" class="form-label">Tanggal Lahir</label>
              <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ $patient->birth_date }}" required />
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
              <label for="gender" class="form-label">Jenis Kelamin</label>
              <select name="gender" id="gender" class="form-control" required>
                <option value="" disabled {{ $patient->gender ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
              </select>
            </div>

            <!-- Nomor Telepon -->
            <div class="mb-3">
              <label for="phone" class="form-label">Nomor Telepon</label>
              <input type="text" name="phone" id="phone" class="form-control" value="{{ $patient->phone }}" />
            </div>

          </div>

          <!-- Kanan -->
          <div class="col-md-6">
            <!-- Status Pernikahan -->
            <div class="mb-3">
              <label for="marital_status" class="form-label">Status Pernikahan</label>
              <select name="marital_status" id="marital_status" class="form-control">
                <option value="" disabled {{ $patient->marital_status ? '' : 'selected' }}>Pilih Status Pernikahan</option>
                <option value="single" {{ $patient->marital_status == 'single' ? 'selected' : '' }}>Belum Menikah</option>
                <option value="married" {{ $patient->marital_status == 'married' ? 'selected' : '' }}>Menikah</option>
                <option value="divorced" {{ $patient->marital_status == 'divorced' ? 'selected' : '' }}>Cerai</option>
              </select>
            </div>

            <!-- Nama Ayah -->
            <div class="mb-3">
              <label for="father_name" class="form-label">Nama Ayah</label>
              <input type="text" name="father_name" id="father_name" class="form-control" value="{{ $patient->father_name }}" />
            </div>

            <!-- Nama Ibu -->
            <div class="mb-3">
              <label for="mother_name" class="form-label">Nama Ibu</label>
              <input type="text" name="mother_name" id="mother_name" class="form-control" value="{{ $patient->mother_name }}" />
            </div>

            <!-- Nama Wali -->
            <div class="mb-3">
              <label for="guardian_name" class="form-label">Nama Wali</label>
              <input type="text" name="guardian_name" id="guardian_name" class="form-control" value="{{ $patient->guardian_name }}" />
            </div>

            <!-- Nomor Identitas -->
            <div class="mb-3">
              <label for="identity_number" class="form-label">Nomor Identitas</label>
              <input type="text" name="identity_number" id="identity_number" class="form-control" value="{{ $patient->identity_number }}" />
            </div>

            <!-- Alergi -->
            <div class="mb-3">
              <label for="allergy" class="form-label">Alergi</label>
              <textarea name="allergy" id="allergy" class="form-control" rows="2">{{ $patient->allergy }}</textarea>
            </div>

            <!-- Pegawai -->
            <div class="mb-3">
              <label for="is_employee" class="form-label">Pegawai?</label>
              <select name="is_employee" id="is_employee" class="form-control">
                <option value="" disabled {{ is_null($patient->is_employee) ? 'selected' : '' }}>Pilih</option>
                <option value="1" {{ $patient->is_employee == 1 ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ $patient->is_employee == 0 ? 'selected' : '' }}>Tidak</option>
              </select>
            </div>

          </div>

        </div>

        <div class="row justify-content-end">
          <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary mt-3">Update</button>
          </div>
        </div>

      </form>

    </div>
  </div>
</div>

@endsection
