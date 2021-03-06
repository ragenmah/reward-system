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
            $table->bigIncrements("R_ID");
            $table->unsignedBigInteger("C_ID");
            $table->double("reward_points");
            $table->double("reward_amount");
            $table->double("claim_amount")->nullable();
            $table->timestamp("expire_date")->nullable();
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
