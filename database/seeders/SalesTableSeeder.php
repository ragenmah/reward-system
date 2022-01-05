<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sales")->insert(
            [
                "S_ID" => 1,
                "C_ID" => 1,
                "Order_ID" => 1001,
                "amount" => 1000,
                "status" => "COMPLETE",
                "date_of_sales" => "2020-05-01 12:10:10"
            ]
        );
        DB::table("sales")->insert(
            [
                "S_ID" => 2,
                "C_ID" => 1,
                "Order_ID" => 1002,
                "amount" => 10000,
                "status" => "PENDING",
                "date_of_sales" => "2020-05-02 12:10:10"
            ]
        );
    }
}
