<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Menampilkan form untuk menambah transaksi
    public function create()
    {
        return view('transactions.create');
    }

    // Menyimpan transaksi
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
            'status' => 'required',
            'total_price' => 'required|numeric',
        ]);

        // Membuat transaksi
        $transaction = Transaction::create([
            'registration_id' => Auth::user()->id,
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date,
            'status' => $request->status,
            'total_price' => 0,
        ]);

        // Menyimpan detail transaksi jika ada
        foreach ($request->action_id as $index => $action_id) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'action_id' => $action_id,
                'dpjp' => $request->dpjp[$index],
                'quantity' => $request->quantity[$index],
                'total_price' => $request->total_price[$index],
            ]);
        }

        return redirect()->route('patients.show', $request->patient_id)->with('success', 'Transaksi berhasil disimpan.');
    }
}
