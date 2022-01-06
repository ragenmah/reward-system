@extends('app')

@section('content')


    <div class="container-all">
        <div class="container-btns">

            <form>
                <div class="header">
                    <h4><span class="badge text-white bg-dark">New Order</span></h4>
                    <h1>Choose Order No:</h1>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="orderId">
                        <option selected>Order id</option>
                        <option value="1001">1001</option>
                        <option value="1002">1002</option>
                        <option value="1003">1003</option>
                        <option value="1004">1004</option>
                        <option value="1005">1005</option>
                        <option value="1006">1006</option>
                    </select>
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
                <a href="/" type="button" class="btns">Home 🏠</a>
                <br>
                <div class="alert alert-success alert-dismissible" style="display: none">
                    <strong>Information!</strong> <span id="msg"></span>
                    <a href="/neworder" type="button" class="btns btn-new">New order 🛒</a>
                </div>
            </form>
            <div style="padding-left: 20px; align-content: space-between">
                @if (isset($fetch_rewards) && $fetch_rewards->isNotEmpty())
                    <div id="show_reward_details">
                        <h5>Your reward points
                            <span class="badge" id="reward_points">{{ $fetch_rewards[0]->reward_points }}</span>
                        </h5>
                        <h5>Your reward Price
                            <span class="badge" id="reward_amount">USD $<span id="reward_amt">
                                    {{ $fetch_rewards[0]->reward_amount }}</span></span>
                        </h5>
                    </div>

                    <br>
                    @if ($fetch_rewards[0]->reward_points != 0)
                        <div id="show_expire_date">
                            <h5>Expiry date: <span class="badge  " id="expire_date">{!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> F Y', strtotime($fetch_rewards[0]->expire_date))) !!}</span>
                            </h5>
                            <br>
                            <div id="date" style="display: none;">
                                {{ $fetch_rewards[0]->expire_date }}
                            </div>
                            <button class="btns" onclick="useRewards()">Use Reward Points 💲</button>
                        </div>
                    @endif
                @endif
            </div>
        </div>
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
                $("#msg").html("Please Select country");
                $(".alert").show();
                $(".btn-new").hide();
            } else
            if (price == null || price == "" || price == 0) {
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

        function useRewards() {
            $expire_date = Date.parse($("#date").text());
            $nowDate = new Date($.now());

            if ($expire_date > $nowDate) {
                ConfirmDialog('Your expire is remaining. Are you sure using reward points?');
            } else {
                ConfirmDialog('Your time has been expired. Are you sure using reward points?');
            }
        }


        function ConfirmDialog(message) {
            $('<div></div>').appendTo('body')
                .html('<div><h6>' + message + '?</h6></div>')
                .dialog({
                    modal: true,
                    title: 'Claim Confirmation',
                    zIndex: 10000,
                    autoOpen: true,
                    width: 'auto',
                    resizable: false,
                    buttons: {
                        Yes: function() {
                            // $('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');

                            saveRewardUsers();
                            $(this).dialog("close");
                        },
                        No: function() {
                            // $('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');

                            $(this).dialog("close");
                        }
                    },
                    close: function(event, ui) {
                        $(this).remove();
                    }
                });

            function saveRewardUsers() {
                $claimAmt = $("#reward_amt").text();
                $nowDate = new Date($.now());
                $.ajax({
                    type: 'POST',
                    url: '/rewardusers',
                    data: {
                        customerId: 1,
                        claim_amt: $claimAmt,
                        used_date: $nowDate,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        };
    </script>
@endpush
