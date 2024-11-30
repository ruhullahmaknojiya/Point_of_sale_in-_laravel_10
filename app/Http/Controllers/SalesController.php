<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{

    public function index()
    {
        $sales = Sales::orderBy('created_at', 'DESC')->get();
        

        return view('sales.index', compact('sales'));
    }
    public function search(Request $request)
    {
        $query = $request->input('barcode');

        $products = Product::where('id', 'like', '%' . $query . '%')->get();



        return response()->json([
            'status' => true,
            'products' => $products
        ]);
    }


    public function salesSearch(Request $request)
    {
        $total = $request->input('total');
        $pay = $request->input('pay');
        $balance = $total - $pay;
        return response()->json([
            'status' => true,
            'balance' => $balance
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salesDetails = SalesDetails::with('products')->get();
        $totalCost = $salesDetails->sum('total_cost');

        // dd($totalCost);
        return view('sales.create', compact('salesDetails', 'totalCost'));
    }


    public function store(Request $request)
    {
        $sales = Sales::create([
            'total' => $request->input('total'),
            'pay' => $request->input('pay'),
            'balance' => $request->input('balance'),
        ]);

        session()->flash('sale_success', 'Sale Records Inserted Successfully.');

        return response()->json([
            'status'  => true,
            'url'     => route('sales_add'),
            'message' => 'Sale records inserted successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sales = Sales::orderBy('created_at', 'DESC')->get();
       
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sales = Sales::find($id);
        return view('sales.edit', compact('sales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sales = Sales::find($id);
        $sales->update([
            'total' => $request->input('total'),
            'pay' => $request->input('pay'),
            'balance' => $request->input('balance'),
        ]);

        session()->flash('sale_success', 'Sale Records Updated Successfully.');

        return redirect()->route('sales.index')->with([
            'sale_success' => 'Sale Records Updated Successfully.'  
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sale = Sales::find($id);

        $sale->delete();
        return redirect('sales')->with('error', 'Sales Records Deleted Successfully');
    }
}
