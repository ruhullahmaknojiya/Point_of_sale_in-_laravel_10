@extends('layout')
@section('content')

<div class="container">
    <h3 align="center" class="mt-5">Products Management</h3>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST"  action="{{ route('products.update',$product->id) }}">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="col-md-6">
                            <label>Products Name</label>
                            <input type="text" class="form-control" name="brands_name" id="brands_name" value="{{ $product->product_name }}">
                        </div>
                        <div class="col-md-6">
                            <label>Category Name</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Menu</option>
                                @foreach($categories as $id => $category_name)
                                    <option value="{{ $id }}" {{ old('category_id', $product->category_id) == $id ? 'selected' : '' }}>
                                        {{ $category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label>Brand Name</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">Select Menu</option>
                                @foreach($brands as $id => $brand_name)
                                    <option value="{{ $id }}" {{ old('brand_id', $product->brand_id) == $id ? 'selected' : '' }}>
                                        {{ $brand_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-6 mt-3">
                            <label>Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection
