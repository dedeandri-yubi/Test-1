<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\City;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index(Request $request)
    {
        $search = '%'.$request->query('search').'%';
            $merchant = Merchant::with('city:id,name')->where('name', 'like', $search)
            ->latest()->paginate(10);
        return view('master.merchant.index',compact('merchant'));
    }

    public function create()
    {
        $city = City::select('id','name')->get();
        return view('master.merchant.create',compact('city'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:merchant,name',
            'city_id' => 'required',
            'expired_date' => 'required|date_format:Y-m-d,H:i:s',
        ]);

        Merchant::create([
            'name' => $request->name,
            'city_id' => $request->city_id,
            'address' => $request->address ?? '',
            'phone' => $request->phone ?? '',
            'expired_date' => $request->expired_date ?? '',
        ]);

        return redirect()->route('merchant.index')->with('success','Merchant created successfully.');
    }

    public function edit(Merchant $merchant)
    {
        $city = City::select('id','name')->get();
        return view('master.merchant.edit',compact('merchant','city'));
    }

    public function update(Request $request, Merchant $merchant)
    {
        $validated = $request->validate([
            'name' => 'required',
            'city_id' => 'required',
            'expired_date' => 'required|date_format:Y-m-d,H:i:s',
        ]);

        $merchant->update($validated);
        return redirect()->route('merchant.index')->with('success','Merchant updated successfully.');
    }

    public function destroy(Merchant $merchant)
    {
        $merchant->delete();
        return redirect()->route('merchant.index')->with('success','Merchant deleted successfully.');
    }
}
