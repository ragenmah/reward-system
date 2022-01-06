<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RewardUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_users', function (Blueprint $table) {
            $table->bigIncrements("RU_ID");
            $table->unsignedBigInteger("C_ID");
            $table->double("used_amount")->nullable();
            $table->timestamp("used_date");
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
        Schema::dropIfExists('reward_users');
    }
}
