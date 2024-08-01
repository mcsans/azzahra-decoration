<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_code',
        'user_id',
        'promotion_id',
        'date',
        'contact_first_name',
        'contact_last_name',
        'contact_email',
        'contact_phone',
        'delivery_address',
        'delivery_date',
        'delivery_time',
        'subtotal',
        'discount',
        'total',
        'snap_token',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id', 'id');
    }

    public function transactionProducts()
    {
        return $this->hasMany(TransactionProduct::class);
    }
}
