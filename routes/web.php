<?php

use App\Http\Controllers\OrderItemsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('order-items/export/', [OrderItemsController::class, 'export'])->name('report.export.excel')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('pengguna', App\Http\Controllers\PenggunaController::class)->middleware('auth');
Route::resource('status', App\Http\Controllers\StatusController::class)->middleware('auth');
Route::resource('merchant', App\Http\Controllers\MerchantController::class);
Route::resource('city', App\Http\Controllers\CityController::class);
Route::resource('product', App\Http\Controllers\ProductController::class);
Route::resource('order_items', App\Http\Controllers\OrderItemsController::class)->middleware('auth');
Route::resource('report', App\Http\Controllers\ReportController::class)->middleware('auth');
