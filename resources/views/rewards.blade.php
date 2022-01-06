@extends('app')

@section('content')

    <div class="container-all">
        <form>
            <h3> logged in as Ragen Maharjan</h3>
            <div class="header">
                <h4><span class="badge text-white bg-dark">Complete Order</span></h4>
                <h1>Choose Order No:</h1>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="orderId">
                    <option value="orders" selected>Order id</option>
                    <option value="1001">1001</option>
                    <option value="1002">1002</option>
                    <option value="1003">1003</option>
                    <option value="1004">1004</option>
                    <option value="1005">1005</option>
                    <option value="1006">1006</option>
                </select>
                {{-- <h6>Total Qty: 1</h6>
                <h6>Total price: 800</h6> --}}
            </div>
            <div class="form-group">
                <label for="checkbox1">Choose country</label>
                <br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons" id="checkbox1">
                    <label class="btn btn-secondary active">
                        <input type="checkbox" autocomplete="off" onchange="chooseCountry('us');">🇺🇸
                    </label>
                    <label class="btn btn-secondary">
                        <input type="checkbox" autocomplete="off" onchange="chooseCountry('np');">🇳🇵
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="priceDetails">Enter your price in <span id="currency">##</span></label>
                <input type="number" class="form-control" id="priceDetails" aria-describedby="priceHelp"
                    placeholder="Enter price" autocomplete="off">
            </div>
            <div style="display: flex;  justify-content:space-evenly">
                OR
            </div>
            <div class="form-check my-2">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Without payment
                </label>
            </div>
            <button type="button" class="btns" onclick="completeYourOrder();">Complete your order 🤜</button>
            <a href="/neworder" type="button" class="btns">New order 🛒</a>
            <a href="/" type="button" class="btns">Home 🏠</a>
            <br>
            <div class="alert alert-success alert-dismissible" style="display: none">
                <strong>Information!</strong> <span id="msg"></span>
                <a href="/neworder" type="button" class="btns btn-new">New order 🛒</a>
            </div>
        </form>
    </div>
@endsection

@push('after-scripts')

    <script>
        $(".alert").hide();
        $(".btn-new").hide();

        function chooseCountry(country) {
            if (country == "us") {
                $("#currency").html("$");
            } else
                $("#currency").html("NPR");
        }

        function completeYourOrder() {
            var currency = $("#currency").text();
            var price = $("#priceDetails").val();
            var orderId = $('#orderId').find(":selected").text();

            if (orderId == "Order id") {
                $("#msg").html("Please Select correct OrderID");
                $(".alert").show();
                $(".btn-new").hide();
            } else if ($("#flexCheckChecked").prop('checked')) {
                saveOrder(currency, 0, orderId, "PENDING")
            } else if (currency == "##") {
                $("#msg").html("Please Select country currency");
                $(".alert").show();
                $(".btn-new").hide();
            } else if (price == null || price == "" || price == 0) {
                $("#msg").html("Price cannot be empty");
                $(".alert").show();
                $(".btn-new").hide();
            } else {
                saveOrder(currency, price, orderId, "COMPLETE")
            }
        }

        function saveOrder(currency, price, orderId, status) {
            $.ajax({
                type: 'POST',
                url: '/postrewards',
                data: {
                    currency: currency,
                    priceDetails: price,
                    customerId: 1,
                    orderId: orderId,
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    // alert("Your order is complete");
                    if (data.errorMsg != "") {
                        $("#msg").html(data.errorMsg);
                    } else {
                        $("#msg").html("Your order is complete");
                    }
                    $(".alert").show();
                    $(".btn-new").show();
                    $("#currency").html("##");
                    $("#priceDetails").val(0);
                    $('#flexCheckChecked').prop('checked', this.value == 1);

                }
            });
        }
        $("#flexCheckChecked").change(function() {
            if ($(this).prop('checked')) {
                alert("You are not paying for this order and also your order will be in pending..");
            }
        });
    </script>
@endpush
