<?php

namespace App\Livewire\Customer;

use App\Models\Transaction;
use Livewire\Component;

class History extends Component
{
    public $transactions;

    public function mount()
    {
        $this->transactions = Transaction::with('transactionProducts.product')
            ->where('user_id', auth()->user()->id)
            ->where('payment_status', 'PAID')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.customer.history');
    }
}
