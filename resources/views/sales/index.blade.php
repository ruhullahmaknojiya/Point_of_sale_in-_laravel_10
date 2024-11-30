@extends('layout')


@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Sales Management</h3>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Pay</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $sales as $key => $sale )
                    <tr>
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ number_format($sale->total,2) }}</td>
                        <td scope="col">
                            {{ number_format($sale->pay,2) }}
                        </td>
                        <td scope="col">
                            {{ number_format($sale->balance,2) }}
                        </td>
                        <td scope="col">
                            <a href="{{  route('sales.edit', $sale->id) }}">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline">
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
        background-color: skyblue;
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
