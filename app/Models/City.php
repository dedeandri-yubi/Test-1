<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'city';
    protected $fillable = [
        'name',
        'longitude',
        'latitude',
    ];

    public function merchant()
    {
        return $this->hasMany(Merchant::class);
    }
}
