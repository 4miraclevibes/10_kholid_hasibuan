@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">
            Daftar Pasien
            <a href="{{ route('patients.create') }}" class="btn btn-sm btn-success">Tambah Pasien</a>
        </h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">Nama Pasien</th>
                        <th class="text-white">NRM</th>
                        <th class="text-white">Provinsi</th>
                        <th class="text-white">Kota/Kabupaten</th>
                        <th class="text-white">Kecamatan</th>
                        <th class="text-white">Kelurahan</th>
                        <th class="text-white">Pendidikan</th>
                        <th class="text-white">Pekerjaan</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->province_id . '-' . $patient->city_id . '-' . $patient->district_id . '-' . $patient->village_id }}</td>
                        <td>{{ $patient->province->name }}</td>
                        <td>{{ $patient->city->name }}</td>
                        <td>{{ $patient->district->name }}</td>
                        <td>{{ $patient->village->name }}</td>
                        <td>{{ $patient->education->name }}</td>
                        <td>{{ $patient->employment->name }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('patients.edit', $patient->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="{{ route('patients.show', $patient->id) }}">
                                      <i class="bx bx-show me-1"></i> Lihat
                                  </a>
                                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data pasien?');">
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
