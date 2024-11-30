<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $products;
    public function __construct()
    {
        $this->products = new Product();
    }


    public function index()
    {
        $products = $this->products->all();
        $categories = Category::pluck('category_name', 'id');
        $brands = Brand::pluck('brands_name', 'id');
        return view('products.index', compact('products', 'categories', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->products->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::pluck('category_name', 'id');
        $brands = Brand::pluck('brands_name', 'id');
        $product = $this->products->find($id);
        return view('products.edit', compact('categories', 'product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $product = $this->products->find($id);
        $product->update(array_merge($product->toArray(), $request->toArray()));
        return redirect('products')->with('success', 'Products Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->products->find($id);
        $product->delete();
        return redirect('products')->with('error', 'Products Deleted');
    }
}
