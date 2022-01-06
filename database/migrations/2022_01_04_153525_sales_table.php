<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements("S_ID");
            $table->unsignedBigInteger('C_ID');
            $table->unsignedBigInteger("Order_ID");
            $table->double("amount");
            $table->string("status");
            $table->timestamp("date_of_sales");
            $table->foreign('Order_ID')->references('Order_ID')->on('orders');
            $table->foreign('C_ID')->references('C_ID')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
