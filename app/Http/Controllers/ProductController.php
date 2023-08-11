<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = '%'.$request->query('search').'%';
            $product = Product::with('merchant:id,name')->where('name', 'like', $search)
            ->latest()->paginate(10);
        return view('master.product.index',compact('product'));
    }

    public function create()
    {
        $merchant = Merchant::select('id','name')->get();
        return view('master.product.create',compact('merchant'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product,name',
            'merchant_id' => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create([
            'name' => $request->name,
            'merchant_id' => $request->merchant_id,
            'price' => $request->price ?? '',
        ]);

        return redirect()->route('product.index')->with('success','Product created successfully.');
    }

    public function edit(Product $product)
    {
        $merchant = Merchant::select('id','name')->get();
        return view('master.product.edit',compact('product','merchant'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'merchant_id' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->update($validated);
        return redirect()->route('product.index')->with('success','Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success','Product deleted successfully.');
    }
}
