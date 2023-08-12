<?php

namespace App\Http\Controllers;

use App\Exports\OrderItemsExport;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderStatus;
use App\Models\Status;
use Maatwebsite\Excel\Facades\Excel;

class OrderItemsController extends Controller
{
    public function index(Request $request)
    {
        $search = '%'.$request->query('search').'%';
            $order_items = OrderItems::with('product:id,name,price','order_status','order_status.status')->whereHas('product', function ($query) use ($search) {
                $query->where('name', 'like', $search);
            })
            ->latest('quantity')->paginate(10);
        return view('transaction.Order.index',compact('order_items'));
    }

    public function create()
    {
        $product = Product::select('id','name')->get();
        $status = Status::select('id','name')->get();
        return view('transaction.Order.create',compact('product','status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'date' => 'required',
        ]);

       $orderItems= OrderItems::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'date' => $request->date,
        ]);

        $orderStatus = OrderStatus::create([
            'order_items_id' => $orderItems->id,
            'status_id' => $request->status_id,
        ]);

        return redirect()->route('order_items.index')->with('success','OrderItems created successfully.');
    }

    public function edit(string $id)
    {
        $order_items = OrderItems::findOrFail($id);
        $product = Product::select('id','name')->get();
        return view('transaction.Order.edit',compact('order_items','product'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'date' => 'required',
        ]);

        // $order_items->update($validated);
        $order_items = OrderItems::findOrFail($id);
        $order_items->product_id = $request->product_id;
        $order_items->quantity = $request->quantity;
        $order_items->date = $request->date;
        $order_items->save();
        return redirect()->route('order_items.index')->with('success','OrderItems updated successfully.');
    }

    public function destroy(OrderItems $order_items)
    {
        $order_items->delete();
        return redirect()->route('order_items.index')->with('success','OrderItems deleted successfully.');
    }

    public function export()
    {
        return Excel::download(new OrderItemsExport, 'order-items.xlsx');
    }
}
