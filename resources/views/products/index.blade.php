@extends('layout')
@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Products Management</h3>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('products.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Products Name</label>
                            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Your Products Name">
                        </div>
                        <div class="col-md-6">
                            <label>Category Name</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Menu</option>
                                @foreach($categories as $id => $category_name)
                                <option value="{{ $id }}">{{ $category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label>Brand </label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">Select Brand</option>
                                @foreach($brands as $id => $brand)
                                <option value="{{ $id }}">{{ $brand }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Price</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Price">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-outline-primary" value="submit">
                        </div>
                    </div>
                </form>
            </div>

            <div class="mt-3">
                @if(Session::has('success'))
                <h5 class="alert alert-success">{{Session::get('success') }}</h5>
                @endif

                @if(Session::has('error'))
                <h5 class="alert alert-danger">{{Session::get('error') }}</h5>
                @endif
            </div>

            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Brand Name</th>

                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $products as $key => $product )
                    <tr>
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $product->product_name }}</td>
                        <td scope="col">{{ $product->category->category_name }}</td>
                        <td scope="col">{{ $product->brand->brands_name }}</td>
                        <td scope="col">
                            {{ $product->price }}
                        </td>


                        <td scope="col">
                            <a href="{{  route('products.edit', $product->id) }}">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return check_delete();" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('css')
<style>
    .form-area {
        padding: 20px;
        margin-top: 20px;
        background-color: powderblue;
    }

    .bi-trash-fill {
        color: red;
        font-size: 18px;
    }

    .bi-pencil {
        color: green;
        font-size: 18px;
        margin-left: 20px;
    }

</style>
@endpush


<script>
    function check_delete() {
        return confirm("Are You Sure Want To delete this Records?");
    }

</script>
