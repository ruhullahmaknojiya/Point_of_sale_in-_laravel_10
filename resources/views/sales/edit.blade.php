@extends('layout')
@section('content')

<div class="container">
    <h3 align="center" class="mt-5">Sales Management</h3>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('sales.update', $sales->id) }}">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="col-md-6">
                            <label>total</label>
                            <input type="text" class="form-control" name="total" id="total" value="{{ $sales->total }}">
                        </div>
                        <div class="col-md-6">
                            <label>Pay</label>
                            <input type="number" class="form-control" name="pay" id="pay" value="{{ $sales->pay }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label>balance</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Price" value="{{ $sales->balance }}">
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


<script>
    $(document).ready(function() {
        $("#save").click(function(e) {
            e.preventDefault();

            var total = $("#total").val();
            var pay = $("#pay").val();
            var balance = $("#balance").val();



            $.ajax({
                type: "post"
                , url: "{{ route('sales_add') }}"
                , data: {
                    'total': total
                    , 'pay': pay
                    , 'balance': balance
                }
                , dataType: "json"
                , headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
                , success: function(response) {
                    if (response.status === true) {
                        alert("Sales Records Inserted Successfully");
                    } else {

                    }

                }
            });



        });
    });

</script>


@endsection
