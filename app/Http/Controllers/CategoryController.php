<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $categories;
    public function __construct()
    {
        $this->categories = new Category();
    }


    public function index()
    {
        $response['categories'] = $this->categories->all();
        return view('category.index')->with($response);
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
        
        $this->categories->create($request->all());
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
        $response['category'] = $this->categories->find($id);
        return view('category.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $category = $this->categories->find($id);
        $category->update(array_merge($category->toArray(), $request->toArray()));
        return redirect('category.index')->with('flash_message','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->categories->find($id);
        $category->delete();
        return redirect('category.index');
    }
}
