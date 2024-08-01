<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\Transaction\SendTicketMail;
use App\Models\Cart;
use App\Models\EventPackage;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');

        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {

            $transaction = Transaction::where('transaction_code', $request->order_id)->first();

            if ($transaction) {

                $payment_status = '';

                switch ($request->transaction_status) {
                    case 'capture':
                        $payment_status = 'PAID';
                        break;
                    case 'settlement':
                        $payment_status = 'PAID';
                        break;
                    case 'pending':
                        $payment_status = 'UNPAID';
                        break;
                    case 'deny':
                        $payment_status = 'CANCELLED';
                        break;
                    case 'expire':
                        $payment_status = 'EXPIRED';
                        break;
                    case 'cancel':
                        $payment_status = 'CANCELLED';
                        break;
                    default:
                        $payment_status = 'UNPAID';
                        break;
                }

                // Update Payment Status
                $transaction->update(['payment_status' => $payment_status]);

                // Delete Cart
                Cart::where('user_id', $transaction->user_id)->delete();
            }
        }
    }
}
