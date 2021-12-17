<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('orders')->insert([
            'Order_ID' => 1001,
            'Order_Date' => "2007-05-01 12:10:10",
            'Sales_Type' => "Normal",
        ]);
        DB::table('orders')->insert([
            'Order_ID' => 1002,
            'Order_Date' => "2007-05-07 05:28:55",
            'Sales_Type' => "Normal",
        ]);
        DB::table('orders')->insert([
            'Order_ID' => 1003,
            'Order_Date' => "2007-05-19 17:17:00",
            'Sales_Type' => "Promotion",
        ]);
        DB::table('orders')->insert([
            'Order_ID' => 1004,
            'Order_Date' => "2007-05-22 22:47:16",
            'Sales_Type' => "Promotion",
        ]);
        DB::table('orders')->insert([
            'Order_ID' => 1005,
            'Order_Date' => "2007-05-27 08:15:07",
            'Sales_Type' => "Promotion",
        ]);
        DB::table('orders')->insert([
            'Order_ID' => 1006,
            'Order_Date' => "2007-06-01 06:35:59",
            'Sales_Type' => "Normal",
        ]);
    }
}
