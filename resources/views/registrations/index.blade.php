@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">
            Daftar Registrasi Pasien
            <a href="{{ route('registrations.create') }}" class="btn btn-sm btn-success">Tambah Registrasi</a>
        </h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">Nama Pasien</th>
                        <th class="text-white">Kategori Pasien</th>
                        <th class="text-white">Pegawai</th>
                        <th class="text-white">Ruangan</th>
                        <th class="text-white">Nomor Asuransi</th>
                        <th class="text-white">Tanggal</th>
                        <th class="text-white">Status</th>
                        <th class="text-white">Jenis Pasien</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $registration)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $registration->patient->name ?? '-' }}</td>
                        <td>{{ $registration->patientCategory->name ?? '-' }}</td>
                        <td>{{ $registration->employee->name ?? '-' }}</td>
                        <td>{{ $registration->room->name ?? '-' }}</td>
                        <td>{{ $registration->insurance_number ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($registration->date)->translatedFormat('d F Y') }}</td>
                        <td>{{ $registration->status ?? '-' }}</td>
                        <td>{{ $registration->is_inpatient ? 'Rawat Inap' : 'Rawat Jalan' }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('registrations.edit', $registration->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="{{ route('registrations.show', $registration->id) }}">
                                      <i class="bx bx-show me-1"></i> Lihat
                                  </a>
                                    <form action="{{ route('registrations.destroy', $registration->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data registrasi?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
