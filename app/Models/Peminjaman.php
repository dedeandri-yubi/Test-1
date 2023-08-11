<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'id',
        'cars_id',
        'no_peminjaman',
        'nama_peminjam',
        'no_telepon',
        'jenis_kelamin',
        'alamat',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'cars_id', 'id');
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
