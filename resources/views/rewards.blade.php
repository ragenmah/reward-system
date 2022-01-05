@extends('app')
@push('after-styles')
    <style>
        fieldset {
            border: 5px solid black;
            border-radius: 10px;
            padding: 10px;
        }

        legend {
            background-color: gray;
            color: white;
            padding: 5px 10px;

        }

    </style>
@endpush
@section('content')
    <center>
        <h1>Reward System</h1>
        <table border="1" cellpadding=5 cellspacing=0>
            <th>#</th>
            <th>Customer Name</th>
            <th>Sales Amount</th>
            <th>Complete order</th>
            <th>Status</th>
            <th>Rewarded points</th>
            <th>new order?</th>
            <th>Remaining points</th>
            <th>Reward Price</th>
            <th>Expiry Date</th>
            <tr>
                <td>1</td>
                <td>Ram</td>
                <td>$<input type="number" name="sales amount" id="salesAmount-1"></td>
                <td><button type="submit" value="1" onclick="completeOrders(1,'false')">Complete your order</button></td>
                <td id="status-1">Incomplete</td>
                <td id="reward-points-1">0</td>
                <td><button type="submit" onclick="completeOrders(1,'true')">new order</button></td>
                <td id="remain-points-1">0</td>
                <td id="reward-price-1">0</td>
                <td id="expire-date-1">N/A</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Hari</td>
                <td>$<input type="number" name="sales amount" id="salesAmount-2"></td>
                <td><button type="submit" value="1" onclick="completeOrders(2,'false')">Complete your order</button></td>
                <td id="status-2">Incomplete</td>
                <td id="reward-points-2">0</td>
                <td><button type="submit" onclick="completeOrders(2,'true')">new order</button></td>
                <td id="remain-points-2">0</td>
                <td id="reward-price-2">0</td>
                <td id="expire-date-2">N/A</td>
            </tr>
        </table>

    </center>

    <div class="container-all">
        <div class="header">
            <h1>Your Order No: 1001</h1>
            <h6>Total Qty: 1</h6>
            <h6>Total price: 800</h6>

        </div>
        <form>
            <div class="form-group">
                <label for="checkbox1">Choose country</label>
                <br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons" id="checkbox1">
                    <label class="btn btn-secondary active">
                        <input type="checkbox" checked autocomplete="off" onchange="chooseCountry('us');">🇺🇸
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
                <small id="priceHelp" class="form-text text-danger">Please choose the country</small>
            </div>
            <button type="submit" class="btns" onclick="completeYourOrder();">Complete your order 🤜</button>
        </form>
    </div>
@endsection

@push('after-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>

    <script>
        function chooseCountry(country) {
            if (country == "us") {
                $("#currency").html("$");
            } else
                $("#currency").html("NPR");
        }

        function completeYourOrder() {
            var currency = $("#currency").text();
            var price = $("#priceDetails").val();

            $.ajax({
                type: 'POST',
                url: '/postrewards',
                data: {
                    currency: currency,
                    priceDetails: price,
                    customerId: 1,
                    orderId:1001,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    alert("Your order is complete");
                    if (sales_amount != 0 || new_order == 'true') {
                        $("#status-" + userid).html(data.status);
                        $("#salesAmount-" + userid).val(0);
                        $("#reward-points-" + userid).html(data.rewardPoints);
                        $("#remain-points-" + userid).html(data.remainingPoints);
                        $("#expire-date-" + userid).html(data.expireDate);
                        $("#reward-price-" + userid).html(data.rewardPrice);
                        
                    }
                }
            });

        }

        function completeOrders(userid, new_order) {
            var sales_amount = $("#salesAmount-" + userid).val();
            var reward_points = $("#reward-points-" + userid).val();
            var remain_Points = $("#remain-points-" + userid).text();
            var expire_date = $("#expire-date-" + userid).text();
            var reward_price = $("#reward-price-" + userid).text();
            console.log(new_order);
            $.ajax({
                type: 'POST',
                url: '/addrewards',
                data: {
                    salesAmount: sales_amount,
                    rewardPoints: reward_points,
                    remainPoints: remain_Points,
                    expireDate: expire_date,
                    rewardPrice: reward_price,
                    newOrder: new_order,
                    customerId: userid,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    if (sales_amount != 0 || new_order == 'true') {
                        $("#status-" + userid).html(data.status);
                        $("#salesAmount-" + userid).val(0);
                        $("#reward-points-" + userid).html(data.rewardPoints);
                        $("#remain-points-" + userid).html(data.remainingPoints);
                        $("#expire-date-" + userid).html(data.expireDate);
                        $("#reward-price-" + userid).html(data.rewardPrice);
                    }
                }
            });
        }
    </script>
@endpush
