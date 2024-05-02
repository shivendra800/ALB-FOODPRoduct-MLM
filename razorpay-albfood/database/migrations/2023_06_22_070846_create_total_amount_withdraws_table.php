<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_amount_withdraws', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->text('wallet_total_amount');
            $table->text('total');
            $table->text('withdrwa_amount');
            $table->text('total_withdrwa_amount');
            $table->text('remark');
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
        Schema::dropIfExists('total_amount_withdraws');
    }
};
