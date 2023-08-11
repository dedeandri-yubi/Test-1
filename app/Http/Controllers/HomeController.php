<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Merchant;
use App\Models\OrderItems;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product = Product::count();
        $merchant = Merchant::count();
        $orderItems = OrderItems::count();
        return view('dashboard.index',compact('product','merchant','orderItems'));
    }

}
