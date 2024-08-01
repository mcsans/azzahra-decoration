<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
