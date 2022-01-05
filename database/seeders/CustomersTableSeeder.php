<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'C_ID' => 1,
            'c_name' => "Ragen Maharjan",
            'c_address' => "Kirtipur",           
        ]);
        DB::table('customers')->insert([
            'C_ID' => 2,
            'c_name' => "Ram Sam",
            'c_address' => "Kirtipur",           
        ]);
    }
}
