@extends('layout')
@section('content')


<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    <h3 align="left" class="mt-5">POS</h3>

    <div class="row">
        <div class="col-sm-8">


            <form class="form-horizontal" id="frmInvoice">
                <table class="table table-bordered" id="products_list">
                    <caption>Add Products</caption>
                    <tr>
                        <th>Products Code</th>
                        <th>Products Name</th>
                        <th style="width:120px;">Price</th>
                        <th style="width:120px;">Qty</th>
                        <th>Amount</th>
                        <th>Option</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" id="barcode" placeholder="Barcode" name="barcode" size="25px" required>
                        </td>
                        <td>
                            <input type="text" class="form-control pname" placeholder="Product Name" name="pname" size="25px" readonly>
                        </td>
                        <td>
                            <input type="text" class="form-control pro_price" name="pro_price" id="pro_price" size="25px" placeholder="Price">
                        </td>
                        <td>
                            <input type="number" class="form-control qty" name="qty" id="qty" size="25px" placeholder="Qty" min="1" value="1" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="total_cost" id="total_cost" size="35px" placeholder="Total Cost" required>
                        </td>
                        <td>
                            <button class="btn btn-success" type="button" onclick="addProduct()">Add</button>
                        </td>
                    </tr>
                </table>
            </form>


            @if(Session::has('success'))
            <h5 class="alert alert-success">{{Session::get('success') }}</h5>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Sales Records list</h4>
                    <a href="" class="btn btn-secondary">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <caption>Products List</caption>
                        <thead>
                            <tr>
                                <th style="width:40px;">Id</th>
                                <th>Products Code</th>
                                <th>Products Name</th>
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody id="productsTableBody">
                            @if($salesDetails->isNotEmpty())
                            @foreach ($salesDetails as $salesDetail)
                            <tr data-id="1">
                                <td>{{ $salesDetail->id }}</td>
                                <td>{{ $salesDetail->products->id }}</td>
                                <td>{{ $salesDetail->products->product_name }}</td>
                                <td>{{ number_format($salesDetail->price, 2) }}</td>
                                <td>{{ $salesDetail->qty }}</td>
                                <td>{{ number_format($salesDetail->total_cost,2) }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">No Records Found</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">Total</td>
                                <td>{{ number_format($totalCost) }}</td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>


        </div>
        <div class="col-sm-4">
            @if(Session::has('sale_success'))
            <h5 class="alert alert-success">{{Session::get('sale_success') }}</h5>
            @endif
            <form action="" method="post">
                <div class="col s12 m6-offset-m4">
                    <div class="form-group mt-3" align="left">
                        <label for="total">Total</label>
                        <input type="text" class="form-control" placeholder="Total" name="total" id="total" size="30px" value="{{ !empty($totalCost) ? $totalCost : '' }}">
                    </div>

                    <div class="form-group mt-3" align="left">
                        <label for="">Pay</label>
                        <input type="text" class="form-control" placeholder="pay" name="pay" id="pay" size="30px" required>
                        <span id="error_message">
                        </span>
                    </div>
                    <div class="form-group mt-3" align="left">
                        <label for="">Balance</label>
                        <input type="text" class="form-control" placeholder="Balance" name="balance" id="balance" size="30px" required="">
                    </div>
                    <div class="card" align="right">
                        <button type="button" id="save" class="btn btn-info mt-3">Update Invoice</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMFKG77L5LWgaPeJtw9MBM4i5wM6sA0m6dUQ5f2mb/zMJr9h+2hV8ozXcEcvxtSRE2YNv4X0gXtmh3Oo4lmw7A==" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script>
    $("#barcode").keyup(function() {
        var barcode = $("#barcode").val();

        if (barcode) {
            $.ajax({
                type: "POST"
                , url: '/search'
                , dataType: "json"
                , headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
                , data: {
                    barcode: barcode
                    , token: '{{ csrf_token() }}'
                }
                , success: function(response) {
                    if (response.status == true) {
                        var product = response.products[0];


                        $(".pname").val(product.product_name);
                        $("#pro_price").val(product.price);
                    } else {

                        $(".pname").val('');
                        $("#pro_price").val('');
                    }
                }
                , error: function() {
                    alert('Error fetching product details.');
                }
            });
        }
    });

</script>

<script>
    $(function() {

        $("#pro_price, #qty").on("keyup change", function() {
            calculateTotalCost();
        });


        function calculateTotalCost() {
            var price = parseFloat($("#pro_price").val()) || 0;
            var qty = parseInt($("#qty").val()) || 0;
            var totalCost = price * qty;
            $("#total_cost").val(totalCost.toFixed(2));
        }








        function addRowToTable(salesDetails) {
            var row = `<tr>
        <td>${salesDetails.barcode}</td>
        <td>${salesDetails.pname}</td>
        <td>${salesDetails.pro_price}</td>
        <td>${salesDetails.qty}</td>
        <td>${salesDetails.total_cost}</td>
    </tr>`;
            $("#products_list").append(row);
        }


        window.deleteProduct = function(productId) {
            $.ajax({
                type: "POST"
                , url: "/sales"
                , data: {
                    product_id: productId
                    , _token: $('meta[name="csrf-token"]').attr('content')
                }
                , success: function(response) {
                    if (response.status === "success") {

                        $("tr[data-id='" + productId + "']").remove();
                    } else {
                        alert("Error deleting product.");
                    }
                }
                , error: function(xhr, status, error) {
                    alert("There was an error deleting the product.");
                }
            });
        }
    });

</script>

<script>
    function addProject() {
        var table_data = [];

        $('product_list tbody tr').each(function(row, tr) {
            var sub = {
                'barcode': $(tr).find('td:eq(1)').text()
                , 'pname': $(tr).find('td:eq(2)').text()
                , 'pro_price': $(tr).find('td:eq(3)').text()
                , 'qty': $(tr).find('td:eq(4)').text()
                , 'total_cost': $(tr).find('td:eq(5)').text()
            , };
            table_data.push(sub);
        });

        console.log(table_data);

        var total = $("#total").val();
        var pay = $("#pay").val();
        var balance = $("#balance").val();

        $.ajax({
                type: "POST"
                , url: "{{ route('sales_add') }}"
                , dataType: "json"
                , headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
                , data: {
                    total: total
                    , pay: pay
                    , balance: balance
                    , product: table_data
                    , token: '{{ csrf_token() }}'
                }
                , success: function(response) {

                    alert(response.message);
                    window.location.href = "{{ route('sales.create') }}";
                    , error: function(xhr, status, error) {
                        alert("Error: " + xhr.responseText);
                    }
                });
        }

</script>

<script>
    window.addProduct = function() {
        var barcode = $("#barcode").val();
        var pname = $("#pname").val();
        var price = $("#pro_price").val();
        var qty = $("#qty").val();
        var totalCost = $("#total_cost").val();


        if (barcode === '') {
            alert("Please enter the barcode.");
            return;
        }

        if (price === '') {
            alert("Please enter the price.");
            return;
        }

        if (qty === '') {
            alert("Please enter the quantity.");
            return;
        }

        if (totalCost === '') {
            alert("Please enter the total cost.");
            return;
        }


        var data = {
            barcode: barcode
            , pname: pname
            , pro_price: price
            , qty: qty
            , total_cost: totalCost
            , _token: $('meta[name="csrf-token"]').attr('content')
        };


        $.ajax({
            type: "POST"
            , url: "{{ route('sales_details_add') }}"
            , data: data
            , success: function(response) {

                alert(response.message);
                window.location.href = "{{ route('sales.create') }}";

            }
            , error: function(xhr, status, error) {
                alert("There was an error saving the product.");
            }
        });
    }

</script>

<script>
    $("#pay").change(function() {
        var total = $("#total").val();
        var pay = $("#pay").val();

        if (pay > total) {

            $("#error_message").text("Pay Amount Cannot Exceed the total Amount.").css("color", "red").show();

        }



        if (total && pay) {
            $.ajax({
                type: "POST"
                , url: "{{ route('sales_search') }}"
                , data: {
                    total: total
                    , pay: pay
                }
                , dataType: "json"
                , headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
                , success: function(response) {
                    if (response.status) {
                        $("#balance").val(response.balance);
                    }
                }
            });
        }
    });

</script>


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
                    }
                }
            });
        });
    });

</script>



@endsection
