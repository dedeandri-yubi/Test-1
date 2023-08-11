<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = [
        'merek',
        'model',
        'tahun',
        'warna',
        'plat_nomor',
        'harga_sewa',
        'status',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }


}
