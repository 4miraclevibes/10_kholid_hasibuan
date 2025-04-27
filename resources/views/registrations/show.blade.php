@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Detail Pendaftaran Pasien</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Nama Pasien:</strong><br>
                {{ $registration->patient->name }}
            </div>
            <div class="mb-3">
                <strong>Kategori Pasien:</strong><br>
                {{ $registration->patientCategory->name }}
            </div>
            <div class="mb-3">
                <strong>Karyawan:</strong><br>
                {{ $registration->employee->name }}
            </div>
            <div class="mb-3">
                <strong>Ruangan:</strong><br>
                {{ $registration->room->name }}
            </div>
            <div class="mb-3">
                <strong>Nomor Asuransi:</strong><br>
                {{ $registration->insurance_number }}
            </div>
            <div class="mb-3">
                <strong>Tanggal Pendaftaran:</strong><br>
                {{ \Carbon\Carbon::parse($registration->date)->format('d-m-Y') }}
            </div>
            <div class="mb-3">
                <strong>Status:</strong><br>
                {{ $registration->status }}
            </div>
            <div class="mb-3">
                <strong>Rawat Inap:</strong><br>
                {{ $registration->is_inpatient ? 'Ya' : 'Tidak' }}
            </div>
        </div>
    </div>
</div>

@endsection
