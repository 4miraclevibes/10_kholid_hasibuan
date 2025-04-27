@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Detail Pasien</h5>
      <a href="{{ route('patients.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card-body">
      <div class="row">
        
        <!-- Kiri -->
        <div class="col-md-6">
          <!-- Tampilkan detail pasien -->
          <div class="mb-3">
            <strong>NRM:</strong><br>
            {{ $patient->province_id . '-' . $patient->city_id . '-' . $patient->district_id . '-' . $patient->village_id }}
          </div>

          <div class="mb-3">
            <strong>Nama:</strong><br>
            {{ $patient->name }}
          </div>

          <div class="mb-3">
            <strong>Tempat, Tanggal Lahir:</strong><br>
            {{ $patient->birth_place }}, {{ \Carbon\Carbon::parse($patient->birth_date)->translatedFormat('d F Y') }}
          </div>

          <div class="mb-3">
            <strong>Jenis Kelamin:</strong><br>
            {{ $patient->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}
          </div>

          <div class="mb-3">
            <strong>Nomor Telepon:</strong><br>
            {{ $patient->phone ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Status Pernikahan:</strong><br>
            @php
              $marital = [
                'single' => 'Belum Menikah',
                'married' => 'Menikah',
                'divorced' => 'Cerai'
              ];
            @endphp
            {{ $marital[$patient->marital_status] ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Pendidikan:</strong><br>
            {{ $patient->education->name ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Pekerjaan:</strong><br>
            {{ $patient->employment->name ?? '-' }}
          </div>

        </div>

        <!-- Kanan -->
        <div class="col-md-6">
          <div class="mb-3">
            <strong>Alamat:</strong><br>
            {{ $patient->address ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Provinsi:</strong><br>
            {{ $patient->province->name ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Kabupaten/Kota:</strong><br>
            {{ $patient->city->name ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Kecamatan:</strong><br>
            {{ $patient->district->name ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Kelurahan/Desa:</strong><br>
            {{ $patient->village->name ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Nama Ayah:</strong><br>
            {{ $patient->father_name ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Nama Ibu:</strong><br>
            {{ $patient->mother_name ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Nama Wali:</strong><br>
            {{ $patient->guardian_name ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Nomor Identitas:</strong><br>
            {{ $patient->identity_number ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Alergi:</strong><br>
            {{ $patient->allergy ?? '-' }}
          </div>

          <div class="mb-3">
            <strong>Pegawai:</strong><br>
            {{ $patient->is_employee === 1 ? 'Ya' : ($patient->is_employee === 0 ? 'Tidak' : '-') }}
          </div>

        </div>

      </div>
    </div>
  </div>
</div>

@endsection
