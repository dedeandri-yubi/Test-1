<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $table = 'merchant';
    protected $fillable = [
        'city_id',
        'name',
        'address',
        'phone',
        'expired_date',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
