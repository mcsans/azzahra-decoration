<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_product_id',
        'picture',
        'name',
        'price',
        'stock',
        'description',
    ];

    public function categoryProduct(): BelongsTo
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id', 'id');
    }
}
