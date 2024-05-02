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
        Schema::create('withdraw_amounts', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->nullable();
            $table->integer('user_id');
            $table->string('bank_name');
            $table->string('bank_ifsc_code');
            $table->string('bank_branch');
            $table->string('account_no');
            $table->string('account_holder_name');
            $table->float('withdraw_amount_req',8, 2);
            $table->float('total_amount',8, 2);
            $table->float('after_withdraw_total_amt',8, 2);
            $table->string('status');
            $table->string('transaction_id')->nullable();
            $table->string('upload_payment_slip')->nullable();
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
        Schema::dropIfExists('withdraw_amounts');
    }
};
