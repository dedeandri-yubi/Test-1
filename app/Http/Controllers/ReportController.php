<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\City;
use App\Models\OrderItems;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::with('merchant:id,city_id,name','merchant.city')->select('id','merchant_id','name')->get();
        $city = City::select('id','name')->get();
        $search = '%'.$request->query('search').'%';
            $report = OrderItems::with('product:id,name,price,merchant_id','product.merchant:id,city_id,name','product.merchant.city')
            ->when($request->get('date'),function($q){
                $q->whereDate('date',request()->get('date'));

            })
            ->when($request->get('city_id'),function($q){
                $q->whereHas('product.merchant.city',function($q){
                    $q->where('id',request()->get('city_id'));
                });
            })
            ->when($request->get('product_id'), function($q){
                $q->where('product_id',request()->get('product_id'));
            })
            -> whereHas('product', function ($query) use ($search) {
                $query->where('name', 'like', $search);
            })
            ->latest('quantity')->paginate(10)->withQueryString();

        return view('transaction.Report.index',compact('report','product','city'));
    }

    public function export_excel(Request $request)
    {
        $product = Product::with('merchant:id,city_id,name','merchant.city')->select('id','merchant_id','name')->get();
        $city = City::select('id','name')->get();
        $search = '%'.$request->query('search').'%';
            $report = OrderItems::with('product:id,name,merchant_id','product.merchant:id,city_id,name','product.merchant.city')-> whereHas('product', function ($query) use ($search) {
                $query->where('name', 'like', $search);
            })
            ->latest()->paginate(10);

        return view('transaction.Report.index',compact('report','product','city'));
    }
}
