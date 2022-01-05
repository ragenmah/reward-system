<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->unsignedBigInteger("R_ID")->primary();
            $table->unsignedBigInteger("C_ID");
            $table->double("reward_points");
            $table->double("reward_amount");
            $table->timestamp("expire_date");
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
        Schema::dropIfExists('rewards');
    }
}
