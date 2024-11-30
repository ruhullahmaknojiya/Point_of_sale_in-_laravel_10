<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SalesDetails;
use Illuminate\Http\Request;

class SalesDetailsController extends Controller
{
    public function store(Request $request)
    {

        $salesDetails = SalesDetails::create([
            'product_id' => $request->barcode,
            'price' => $request->pro_price,
            'qty' => $request->qty,
            'total_cost' => $request->total_cost,
        ]);


        session()->flash('success', 'sales details Records Inserted Successfully');

        return response()->json([
            'status' => true,
            'message' => 'sales details Records Inserted Successfully.',
            'salesDetails' => $salesDetails
        ]);
    }

    public function index()
    {
        $salesDetails = SalesDetails::latest()->get();
        $totalCost = $salesDetails->sum('total_cost');
        dd($totalCost);
        return view('sales.create', compact('salesDetails', 'totalCost'));
    }
}
