<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Car;

class PeminjamanController extends Controller
{
   public function index(Request $request)
   {
    $search = '%'.$request->query('search').'%';
    $peminjaman = Peminjaman::where('nama_peminjam', 'like', $search)
    ->orWhere('no_peminjaman', 'like', $search)
    ->latest()->paginate(10);
       return view('transaction.peminjaman.index',compact('peminjaman'));
   }

    public function create()
    {
         $peminjaman = Peminjaman::orderBy('id', 'desc')->first();
         if ($peminjaman == null) {
              $no_peminjaman = 'NP001';
         } else {
              $no_peminjaman = 'NP' . sprintf("%03d", abs($peminjaman->id + 1));
         }
         $cars =Car::where ('status', 'Tersedia')->get();
         return view('transaction.peminjaman.create',compact('no_peminjaman','cars'));
    }

    public function store(Request $request)
    {
         $request->validate([
                'no_peminjaman' => 'required',
                'nama_peminjam' => 'required',
                'no_telepon' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'cars_id' => 'required',
                'tanggal_peminjaman' => 'required',
                'tanggal_pengembalian' => 'required|after_or_equal:tanggal_peminjaman',
         ]);

         Car::where('id', $request->cars_id)->update([
              'status' => 'Disewa',
         ]);

         Peminjaman::create($request->all());

         return redirect()->route('peminjaman.index')
              ->with('success','Peminjaman created successfully.');
    }

    public function show(Peminjaman $peminjaman)
    {
         return view('transaction.peminjaman.show',compact('peminjaman'));
    }

    public function edit(Peminjaman $peminjaman)
    {
        $cars =Car::where ('status', 'Tersedia')->get();
         return view('transaction.peminjaman.edit',compact('peminjaman','cars'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
         $request->validate([
                'nama_peminjam' => 'required',
                'no_telepon' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'cars_id' => 'required',
                'tanggal_peminjaman' => 'required',
                'tanggal_pengembalian' => 'required',
         ]);

         $peminjaman->update($request->all());

         return redirect()->route('peminjaman.index')
              ->with('success','Peminjaman updated successfully');
    }

    public function destroy(Peminjaman $peminjaman)
    {
         $peminjaman->delete();

         return redirect()->route('peminjaman.index')
              ->with('success','Peminjaman deleted successfully');
    }

}
