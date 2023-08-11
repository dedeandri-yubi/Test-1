<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $search = '%'.$request->query('search').'%';
            $cars = Car::where('merek', 'like', $search)
            ->orWhere('model', 'like', $search)
            ->latest()->paginate(10);
        return view('cars.index',compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'plat_nomor' => 'required',
            'harga_sewa' => 'required',
            'status' => 'default',
        ]);

        Car::create($request->all());

        return to_route('cars.index')
            ->with('success','Cars created successfully.');
    }

    public function show(Car $car)
    {
        return view('cars.show',compact('car'));
    }

    public function edit(Car $car)
    {
        return view('cars.edit',compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'plat_nomor' => 'required',
            'harga_sewa' => 'required',
            'status' => 'default',
        ]);

        $car->update($validated);

        return to_route('cars.index')
            ->with('success','Cars updated successfully');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return to_route('cars.index')
            ->with('success','Cars deleted successfully');
    }
}
