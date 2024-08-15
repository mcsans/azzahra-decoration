<?php

namespace App\Livewire\Customer;

use App\Models\Cart;
use App\Models\Promotion;
use App\Models\Transaction;
use App\Models\TransactionProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Checkout extends Component
{
    public $cartProducts;

    public $contact_first_name;
    public $contact_last_name;
    public $contact_email;
    public $contact_phone;

    public $delivery_address;
    public $delivery_date;
    public $delivery_time;

    public $promotions;
    public $promotion_code;
    public $promotion_id;

    public $subtotal = 0;
    public $discount;
    public $totalPayment;

    public $transaction_code;

    public function mount()
    {
        $this->promotions = Promotion::all();
        $this->cartProducts = Cart::with('product')->where('user_id', auth()->user()->id)->get();

        foreach ($this->cartProducts as $cartProduct) {
            $subtotal = $cartProduct->product->price * $cartProduct->quantity;

            $cartProduct->product->subtotal = $subtotal;
            $this->subtotal += $subtotal;
            $this->totalPayment += $subtotal;
        }
    }

    public function render()
    {
        return view('livewire.customer.checkout');
    }

    public function save()
    {
        try {

            DB::transaction(function () {

                $now = Carbon::now();

                // Generate Kode Transaksi
                $this->transaction_code = $this->generateTransactionCode();

                // Midtrans
                $snapToken = $this->midtrans();

                // Membuat Transaction
                $transaction = Transaction::create([
                    'transaction_code' => $this->transaction_code,
                    'user_id' => auth()->user()->id,
                    'promotion_id' => $this->promotion_id,
                    'date' => $now,
                    'contact_first_name' => $this->contact_first_name,
                    'contact_last_name' => $this->contact_last_name,
                    'contact_email' => $this->contact_email,
                    'contact_phone' => $this->contact_phone,
                    'delivery_address' => $this->delivery_address,
                    'delivery_date' => $this->delivery_date,
                    'delivery_time' => $this->delivery_time,
                    'subtotal' => $this->subtotal,
                    'discount' => $this->discount,
                    'total' => $this->totalPayment,
                    'snap_token' => $snapToken,
                ]);

                // Membuat Transaction Products
                $transactionProducts = [];
                foreach ($this->cartProducts as $cartProduct) {
                    $transactionProducts[] = [
                        'transaction_id' => $transaction->id,
                        'product_id' => $cartProduct->product_id,
                        'quantity' => $cartProduct->quantity,
                        'price' => $cartProduct->product->price,
                        'total' => ($cartProduct->quantity * $cartProduct->product->price),
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];

                    // Kurangi stock
                    $cartProduct->product->stock = ($cartProduct->product->stock - $cartProduct->quantity);
                    $cartProduct->product->save();
                }
                TransactionProduct::insert($transactionProducts);

                // Run Sandbox
                $this->dispatch('midtrans', snap_token: $snapToken);
            });
        } catch (\Exception $e) {

            Log::error('Failed to create transaction: ' . $e->getMessage());

            $this->dispatch('sweetalert', icon: 'error', title: 'Terjadi kesalahan.', text: 'Silakan hubungi pengembang.');
        }
    }

    public function triggerPromotion()
    {
        $this->discount = 0;
        $this->totalPayment = $this->subtotal;
        $this->promotion_id = null;

        $promotion = $this->promotions->where('code', $this->promotion_code)->first();

        if ($promotion) {

            if ($promotion->type == 'FIXED') {
                $this->discount = $promotion->discount;
                $this->totalPayment = $this->totalPayment - $this->discount;
                $this->promotion_id = $promotion->id;
            }

            if ($promotion->type == 'PERCENT') {
                $this->discount = ($promotion->discount / 100) * $this->subtotal;
                $this->totalPayment = $this->totalPayment - $this->discount;
                $this->promotion_id = $promotion->id;
            }
        }
    }

    public function generateTransactionCode()
    {
        $prefix = 'AZZ';
        $date = Carbon::today()->format('Ymd');
        $worldTime = strtotime(Carbon::now());
        $countToday = Transaction::whereDate('date', Carbon::today())->count() + 1;
        $countFormatted = str_pad($countToday, 4, '0', STR_PAD_LEFT);

        return $prefix . '-' . $date . '-' . $worldTime . '-' . $countFormatted;
    }

    public function midtrans()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => $this->transaction_code,
                'gross_amount' => intval($this->totalPayment),
            ),
            'customer_details' => array(
                'first_name' => $this->contact_first_name,
                'last_name' => $this->contact_last_name,
                'email' => $this->contact_email,
                'phone' => $this->contact_phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return $snapToken;
    }
}
