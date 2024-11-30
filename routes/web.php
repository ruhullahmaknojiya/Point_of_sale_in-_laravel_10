<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesDetailsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
});



Route::resource("/category", CategoryController::class);
Route::resource("/brand", BrandController::class);
Route::resource("/products", ProductController::class);
Route::resource("/sales", SalesController::class);

Route::post('/search',[SalesController::class, 'search'])->name('search');
Route::post('/sales-search',[SalesController::class, 'salesSearch'])->name('sales_search');
Route::post('/sales_add', [SalesController::class, 'store'])->name('sales_add');
Route::post('/sales_details', [SalesDetailsController::class, 'store'])->name('sales_details_add');


Route::post('/delete-product', [ProductController::class, 'destroy'])->name('delete.product');

