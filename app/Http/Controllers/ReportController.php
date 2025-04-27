<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Transaction;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function reportRegistrations(Request $request)
    {
        // Pastikan $start_date dan $end_date adalah objek Carbon
        $start_date = Carbon::parse($request->start_date ?? Carbon::now()->startOfMonth());
        $end_date = Carbon::parse($request->end_date ?? Carbon::now()->endOfMonth());
    
        // Filter berdasarkan rentang tanggal
        $registrations = Registration::whereBetween('date', [$start_date, $end_date])
            ->with('patient') // Menampilkan relasi dengan pasien
            ->get();
    
        return view('reports.registration_report', compact('registrations', 'start_date', 'end_date'));
    }

    public function reportRevenue(Request $request)
    {
        // Mengambil start_date dan end_date dari request, jika tidak ada maka set default menjadi awal dan akhir bulan ini
        $start_date = $request->start_date ? Carbon::parse($request->start_date) : Carbon::now()->startOfMonth();
        $end_date = $request->end_date ? Carbon::parse($request->end_date) : Carbon::now()->endOfMonth();
    
        // Laporan pendapatan per hari
        $revenue_per_day = Transaction::whereBetween('date', [$start_date, $end_date])
            ->selectRaw('DATE(date) as day, SUM(total_price) as total_revenue')
            ->groupBy('day')
            ->orderBy('day', 'ASC')
            ->get();
    
        // Laporan pendapatan per minggu
        $revenue_per_week = Transaction::whereBetween('date', [$start_date, $end_date])
            ->selectRaw('WEEK(date) as week, SUM(total_price) as total_revenue')
            ->groupBy('week')
            ->orderBy('week', 'ASC')
            ->get();
    
        // Laporan pendapatan per bulan
        $revenue_per_month = Transaction::whereBetween('date', [$start_date, $end_date])
            ->selectRaw('MONTH(date) as month, SUM(total_price) as total_revenue')
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();
    
        // Mengirim data ke view
        return view('reports.revenue_report', compact('revenue_per_day', 'revenue_per_week', 'revenue_per_month', 'start_date', 'end_date'));
    }
}
