<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Employee;
use App\Models\Action;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function index($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $transactionDetails = TransactionDetail::where('transaction_id', $transactionId)->get();
        return view('transactions.details.index', compact('transaction', 'transactionDetails'));
    }

    public function create($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $employees = Employee::where('role_id', 4)->get();
        $actions = Action::all();
        return view('transactions.details.create', compact('transaction', 'employees', 'actions'));
    }

    public function store(Request $request, $transactionId)
    {
        $request->validate([
            'action_id' => 'required',
            'dpjp' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $detail = TransactionDetail::create([
            'transaction_id' => $transactionId,
            'action_id' => $request->action_id,
            'dpjp' => $request->dpjp,
            'quantity' => $request->quantity,
            'total_price' => 0, // total price hitung nanti
        ]);

        $detail->update([
            'total_price' => $detail->action->price * $request->quantity
        ]);

        return redirect()->route('transactions.details.index', $transactionId)->with('success', 'Detail transaksi berhasil ditambahkan.');
    }

    public function edit($transactionId, $detailId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $detail = TransactionDetail::findOrFail($detailId);
        $employees = Employee::all();
        $actions = Action::all();
        return view('transactions.details.edit', compact('transaction', 'detail', 'employees', 'actions'));
    }

    public function update(Request $request, $transactionId, $detailId)
    {
        $request->validate([
            'action_id' => 'required',
            'dpjp' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);
        $action = Action::find($request->action_id);

        $detail = TransactionDetail::findOrFail($detailId);
        $detail->update([
            'action_id' => $request->action_id,
            'dpjp' => $request->dpjp,
            'quantity' => $request->quantity,
            'total_price' => $action->price * $request->quantity
        ]);


        return redirect()->route('transactions.details.index', $transactionId)->with('success', 'Detail transaksi berhasil diperbarui.');
    }

    public function destroy($transactionId, $detailId)
    {
        $detail = TransactionDetail::findOrFail($detailId);
        $detail->delete();

        return redirect()->route('transactions.details.index', $transactionId)->with('success', 'Detail transaksi berhasil dihapus.');
    }
}
