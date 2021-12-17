<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
</head>
<body>
    <center>
        <Table cellpadding=5 >
            <th>Order ID</th>
            <th>Items</th>
            <th>Price</th>
            @if (isset($fetch_all))
            {{$orderId=""}}
            @foreach ($fetch_all as $item)
            
            <tr>
             <td>{{($item->orderId==$orderId)?"":$item->orderId}}</td>
             <td>{{$item->Item_Name}}</td>
             <td>{{$item->sales_amount}}</td>
         </tr>   
         <?php $orderId=$item->orderId?>
            @endforeach 
            @endif
         <tr>
             <td></td>
             <td>Total orders:</td>
             <td>{{$fetch_orders[0]->Number_Of_Order}}</td>
         </tr>
         <tr>
             <td></td>
             <td>Total amount:</td>
             <td>{{$fetch_orders[0]->Total_Sales_Amount}}</td>
         </tr>
               
             
        </Table>
    </center>
   
</body>
</html>