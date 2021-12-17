<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('orders_products')->insert([
            'Order_Product_ID' => 2000,
            'Order_ID' => 1001,
            'Item_Name' => "Radio",
            'Normal_Price' => 800.00,
            'Promotion_Price' => 712.99,
        ]);
        DB::table('orders_products')->insert([
            'Order_Product_ID' => 2001,
            'Order_ID' => 1002,
            'Item_Name' => "Portable Audio",
            'Normal_Price' => 16.00,
            'Promotion_Price' => 15.00,
        ]);
        DB::table('orders_products')->insert([
            'Order_Product_ID' => 2002,
            'Order_ID' => 1002,
            'Item_Name' => "THE SIMS",
            'Normal_Price' => 9.99,
            'Promotion_Price' => 8.79,
        ]);
        DB::table('orders_products')->insert([
            'Order_Product_ID' => 2003,
            'Order_ID' => 1003,
            'Item_Name' => "Radio",
            'Normal_Price' => 800.00,
            'Promotion_Price' => 712.99,
        ]);
        DB::table('orders_products')->insert([
            'Order_Product_ID' => 2004,
            'Order_ID' => 1004,
            'Item_Name' => "Scanner",
            'Normal_Price' => 124.00,
            'Promotion_Price' => 120.00,
        ]);
        DB::table('orders_products')->insert([
            'Order_Product_ID' => 2005,
            'Order_ID' => 1005,
            'Item_Name' => "Portable Audio",
            'Normal_Price' => 16.00,
            'Promotion_Price' => 15.00,
        ]);
        DB::table('orders_products')->insert([
            'Order_Product_ID' => 2006,
            'Order_ID' => 1005,
            'Item_Name' => "Radio",
            'Normal_Price' => 800.00,
            'Promotion_Price' => 712.99,
        ]);
        DB::table('orders_products')->insert([
            'Order_Product_ID' => 2007,
            'Order_ID' => 1006,
            'Item_Name' => "Camcorders",
            'Normal_Price' => 359.00,
            'Promotion_Price' => 303.00,
        ]);
        DB::table('orders_products')->insert([
            'Order_Product_ID' => 2008,
            'Order_ID' => 1006,
            'Item_Name' => "Radio",
            'Normal_Price' => 800.00,
            'Promotion_Price' => 712.99,
        ]);
    }
}
