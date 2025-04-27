@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Laporan Pendaftaran Pasien</h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('report.registrations') }}">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Dari Tanggal</label>
                        <div class="col-sm-4">
                            <input type="date" name="start_date" class="form-control" 
                                   value="{{ $start_date instanceof \Carbon\Carbon ? $start_date->format('Y-m-d') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Sampai Tanggal</label>
                        <div class="col-sm-4">
                            <input type="date" name="end_date" class="form-control" 
                                   value="{{ $end_date instanceof \Carbon\Carbon ? $end_date->format('Y-m-d') : '' }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                </form>

                <div class="table-responsive text-nowrap p-3">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Kategori Pasien</th>
                                <th>Ruangan</th>
                                <th>Tanggal Pendaftaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $registration)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $registration->patient->name ?? 'N/A' }}</td>
                                    <td>{{ $registration->patientCategory->name ?? 'N/A' }}</td>
                                    <td>{{ $registration->room->name ?? 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($registration->date)->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
