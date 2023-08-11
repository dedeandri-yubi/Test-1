<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $table = 'product';
    protected $fillable = [
        'merchant_id',
        'name',
        'price',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItems::class);
    }
}
