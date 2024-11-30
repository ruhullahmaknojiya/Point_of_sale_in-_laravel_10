<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{



    protected $brands;


    public function __construct()
    {
        $this->brands = new Brand();
    }

    public function index()
    {
        $response['brands'] = $this->brands->all();
        return view('brand.index')->with($response);
    }

    public function store(Request $request)
    {
        $this->brands->create($request->all());
        return redirect()->back();
    }


    public function show(string $id) {

    }


    public function edit(string $id) {
        $response['brand'] = $this->brands->find($id);
        return view('brand.edit')->with($response);
    }


    public function update(Request $request, string $id) {
        $brands = $this->brands->find($id);
        $brands->update(array_merge($brands->toArray(), $request->toArray()));
        return redirect('brand');
    }


    public function destroy(string $id) {}
}
