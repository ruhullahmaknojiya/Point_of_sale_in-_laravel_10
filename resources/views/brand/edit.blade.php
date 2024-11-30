@extends('layout')
@section('content')

<div class="container">
    <h3 align="center" class="mt-5">Brand Management</h3>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST"  action="{{ route('brand.update',$brand->id) }}">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="col-md-6">
                            <label>Brand Name</label>
                            <input type="text" class="form-control" name="brands_name" id="brands_name" value="{{ $brand->brands_name }}">
                        </div>
                        <div class="col-md-6">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select Menu</option>
                                <option value="1" {{ $brand->status ==1 ? 'selected':'' }}>True</option>
                                <option value="0" {{ $brand->status ==0 ? 'selected':'' }}>False</option>
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
