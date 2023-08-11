<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Car;

class PengembalianController extends Controller
{
   public function index (Request $request)
   {
     $pengembalian = Pengembalian::where('no_pengembalian', 'like', "%" . $request->search . "%")->latest()->paginate(10);
     return view('transaction.pengembalian.index',compact('pengembalian'));
   }

    public function create()
    {
        $pengembalian = Pengembalian::orderBy('id', 'desc')->first();
        if ($pengembalian == null) {
            $no_pengembalian = 'NPB001';
        } else {
            $no_pengembalian = 'NPB' . sprintf("%03d", abs($pengembalian->id + 1));
        }
        $peminjaman = Peminjaman::where('status', 'Disewa')->get();
        return view('transaction.pengembalian.create',compact('no_pengembalian','peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_pengembalian' => 'required',
            'plat_nomor' => 'required',
            'tanggal_pengembalian' => 'required',
        ]);

        $car = Car::where('plat_nomor', $request->plat_nomor)->first();
        if (!$car) {
            return redirect()->back()->with('error', 'Plat nomor tidak ditemukan');
        }
        $peminjaman =Peminjaman::where('cars_id', $car->id)->latest()->first();
        $total_hari = (strtotime($request->tanggal_pengembalian) - strtotime($peminjaman->tanggal_peminjaman)) / 60 / 60 / 24 + 1;

        if ($peminjaman->tanggal_peminjaman > $request->tanggal_pengembalian) {
            return redirect()->back()->with('error', 'Tanggal pengembalian tidak boleh kurang dari tanggal peminjaman');
        }
        Pengembalian::create([
            'peminjaman_id' => $peminjaman->id,
            'no_pengembalian' => $request->no_pengembalian,
            'nama_peminjaman' => $request->nama_peminjaman,
            'plat_nomor' => $request->plat_nomor,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'total_hari' => $total_hari,
            'total_harga' => $total_hari * $car->harga_sewa,
        ]);

        $car->update([
            'status' => 'Tersedia',
        ]);

        $peminjaman ->update([
            'status' => 'Dikembalikan',
        ]);

        return redirect()->route('pengembalian.index')
            ->with('success','Pengembalian created successfully.');
    }
}
