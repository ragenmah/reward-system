@extends('app')

@section('content')

    <div class="container-all">
        <h1>Your Orders</h1>
        <Table cellpadding=10>
            <th>Order ID</th>
            <th>Items</th>
            <th>Price</th>
            @if (isset($fetch_all))
                {{ $orderId = '' }}
                @foreach ($fetch_all as $item)

                    <tr>
                        <td>{{ $item->orderId == $orderId ? '' : $item->orderId }}</td>
                        <td>{{ $item->Item_Name }}</td>
                        <td>{{ $item->sales_amount }}</td>
                    </tr>
                    <?php $orderId = $item->orderId; ?>
                @endforeach
            @endif
            <tr>
                <td></td>
                <td>Total orders:</td>
                <td>{{ $fetch_orders[0]->Number_Of_Order }}</td>
            </tr>
            <tr>
                <td></td>
                <td>Total amount:</td>
                <td>{{ $fetch_orders[0]->Total_Sales_Amount }}</td>
            </tr>


        </Table>
        <a href = "/" class="btns">
            back
        </a>
    </div>

@endsection
