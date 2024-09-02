<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $data['transactions'] = Transaction::with(['user', 'promotion'])
            ->where('payment_status', 'PAID')
            ->latest()
            ->get();

        return view('admin.transactions.index', $data);
    }

    public function show(Transaction $transaction)
    {
        $data['transaction'] = $transaction;

        return view('admin.transactions.show', $data);
    }

    public function confirm($transaction)
    {
        $transaction = Transaction::with('transactionProducts.product')->find($transaction);

        foreach ($transaction->transactionProducts as $transactionProduct) {
            $transactionProduct->product->stock = $transactionProduct->product->stock + $transactionProduct->quantity;
            $transactionProduct->product->save();
        }

        $transaction->is_done = true;
        $transaction->save();

        return redirect()->route('admin.transactions.index')->with('success', 'Konfirmasi Pengembalian Berhasil.');
    }
}
