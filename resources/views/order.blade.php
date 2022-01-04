@extends('app')

@section('content')

    <div class="container-all">
        <h1>Your Orders 🛒</h1>
        <Table  cellpadding="10px">
            <th style="background-color: #c5bcbc; padding:10px;">Order ID</th>
            <th style="background-color: #c5bcbc; padding:10px;">Items</th>
            <th style="background-color: #c5bcbc; padding:10px;">Price</th>
            @if (isset($fetch_all))
                {{ $orderId = '' }}
                @foreach ($fetch_all as $item)
                    <tr >
                        <td style="background-color: #c8c5c5; padding:10px;">{{ $item->orderId == $orderId ? '' : $item->orderId }}</td>
                        <td style="background-color: #c8c5c5; padding:10px;" >{{ $item->Item_Name }}</td>
                        <td style="background-color: #c8c5c5; padding:10px;">{{ $item->sales_amount }}</td>
                    </tr>
                    <?php $orderId = $item->orderId; ?>
                @endforeach
            @endif
            <tr>
                <td style="background-color: #bcb2b2;"></td>
                <td style="background-color: #bcb2b2; color:rgb(36, 22, 22); font-size: 18px; padding:2px;">Total orders:</td>
                <td style="background-color: #bcb2b2; color:red; font-size: 18px; padding:2px; font-weight: bold;">{{ $fetch_orders[0]->Number_Of_Order }}</td>
            </tr>
            <tr>
                <td style="background-color: #c5bbbb;"></td>
                <td style="background-color: #c5bbbb; color:rgb(36, 22, 22);font-size: 18px; padding:2px;">Total amount:</td>
                <td style="background-color: #c5bbbb; color:red;font-size: 18px; padding:2px; font-weight: bold;">{{ $fetch_orders[0]->Total_Sales_Amount }}</td>
            </tr>
        </Table>
        <a href="/" class="btns" style="margin-top: 10px">
            👈🏻 Back
        </a>
    </div>

@endsection
