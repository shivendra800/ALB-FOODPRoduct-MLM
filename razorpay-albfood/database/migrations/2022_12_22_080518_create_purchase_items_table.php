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
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->bigInteger('vendor_id');
            $table->bigInteger('prod_id');
            $table->string('unit');
            $table->string('price');
            $table->string('qty');
            $table->string('tax');
            $table->string('total_price');
            $table->string('previous_balance');
            $table->string('total_billing');
            $table->string('grand_total');
            $table->string('paid_amount');
             
            $table->string('remaining_amount');
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
        Schema::dropIfExists('purchase_items');
    }
};
