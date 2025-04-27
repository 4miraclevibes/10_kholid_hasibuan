@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Laporan Pendapatan</h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('report.revenue') }}">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Dari Tanggal</label>
                        <div class="col-sm-4">
                            <!-- Pastikan $start_date adalah objek Carbon sebelum memanggil format -->
                            <input type="date" name="start_date" class="form-control" value="{{ $start_date instanceof \Carbon\Carbon ? $start_date->format('Y-m-d') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Sampai Tanggal</label>
                        <div class="col-sm-4">
                            <!-- Pastikan $end_date adalah objek Carbon sebelum memanggil format -->
                            <input type="date" name="end_date" class="form-control" value="{{ $end_date instanceof \Carbon\Carbon ? $end_date->format('Y-m-d') : '' }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                </form>

                <h5 class="mt-4">Pendapatan Per Hari</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Total Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($revenue_per_day as $revenue)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($revenue->day)->format('d/m/Y') }}</td>
                                <td>Rp {{ number_format($revenue->total_revenue, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h5 class="mt-4">Pendapatan Per Minggu</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Minggu</th>
                            <th>Total Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($revenue_per_week as $revenue)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>Week {{ $revenue->week }}</td>
                                <td>Rp {{ number_format($revenue->total_revenue, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h5 class="mt-4">Pendapatan Per Bulan</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Total Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($revenue_per_month as $revenue)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse('2021-' . $revenue->month . '-01')->format('F') }}</td>
                                <td>Rp {{ number_format($revenue->total_revenue, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
