@extends('layout')
@section('content')

<div class="container">
    <h3 align="center" class="mt-5">Category Management</h3>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST"  action="{{ route('category.update',$category->id) }}">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="col-md-6">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $category->category_name }}">
                        </div>
                        <div class="col-md-6">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select Menu</option>
                                <option value="1" {{ $category->status ==1 ? 'selected':'' }}>True</option>
                                <option value="0" {{ $category->status ==0 ? 'selected':'' }}>False</option>
                            </select>
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
