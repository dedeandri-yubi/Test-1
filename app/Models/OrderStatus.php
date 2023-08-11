<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    protected $table = 'order_status';
    protected $fillable = [
    'order_items_id' ,
    'status_id' ,
    ];

    public function order_items()
    {
        return $this->belongsTo(OrderItems::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class,'status_id');
    }

}
