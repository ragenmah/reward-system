<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index(Request $request)
    {
        $fetch_orders = DB::table('orders as ord')
            ->join('orders_products as ordp', "ord.Order_ID", "=", "ordp.Order_ID")
            ->select(
                DB::raw("count(DISTINCT ord.Order_ID) as Number_Of_Order"),
                DB::raw(
                    "sum(CASE 
                                when ord.Sales_Type= 'Normal' 
                                    THEN ordp.Normal_Price 
                                ELSE ordp.Promotion_Price 
                        END) as Total_Sales_Amount "
                )
            )->get();

        $fetch_all = DB::table('orders')
            ->join('orders_products', "orders.Order_ID", "=", "orders_products.Order_ID")
            ->select(
                DB::raw(
                    "distinct orders.Order_ID as orderId"
                ),
                DB::raw(
                    "(CASE 
                            when orders.Sales_Type= 'Normal' 
                                THEN orders_products.Normal_Price 
                            ELSE orders_products.Promotion_Price 
                    END) as sales_amount "
                ),
                "orders_products.Item_Name"
            )
            ->get();
        return view("Order", compact('fetch_orders', 'fetch_all'));
    }

    public function newOrder(Request $req)
    {
        
        $fetch_rewards=DB::table("rewards")->where("C_ID",1)->get();
        
        return View("new_order", compact('fetch_rewards'));
    }
}
