<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $registrations = Registration::where('status', 'PENDING')->get();
        return view('transactions.create', compact('registrations'));
    }

    // Menyimpan transaksi
    public function store(Request $request)
    {
        $request->validate([
            'registration_id' => 'required',
            'date' => 'required|date',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
            'status' => 'required',
        ]);

        // dd($request->all());
        // Membuat transaksi
        Transaction::create([
            'registration_id' => $request->registration_id,
            'employee_id' => Auth::user()->id,
            'date' => $request->date,
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date,
            'status' => $request->status,
            'total_price' => 0,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $registrations = Registration::all();

        return view('transactions.edit', compact('transaction', 'registrations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
            'status' => 'required',
        ]);

        $transaction = Transaction::findOrFail($id);
        if($request->status == 'paid'){
            $checkin = Carbon::parse($request->checkin_date);
            $checkout = Carbon::parse($request->checkout_date);
            $days_treated = $checkin->diffInDays($checkout);
            $total = $transaction->transactionDetail->sum('total_price') + ($transaction->registration->room->price * $days_treated);
            $transaction->update([
                'total_price' => $total,
            ]);
        }
        $transaction->update([
            'date' => $request->date,
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date,
            'status' => $request->status,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }
}
