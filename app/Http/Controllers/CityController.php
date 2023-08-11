<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $search = '%'.$request->query('search').'%';
            $city = City::where('name', 'like', $search)
            ->latest()->paginate(10);
        return view('master.city.index',compact('city'));
    }

    public function create()
    {
        return view('master.city.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:city,name',
        ]);

        City::create([
            'name' => $request->name,
            'longitude' => $request->longitude ?? '',
            'latitude' => $request->latitude ?? '',
        ]);

        return redirect()->route('city.index')->with('success','City created successfully.');
    }

    public function edit(City $city)
    {
        return view('master.city.edit',compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'name' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $city->update($validated);
        return redirect()->route('city.index')->with('success','City updated successfully.');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('city.index')->with('success','City deleted successfully.');
    }
}
