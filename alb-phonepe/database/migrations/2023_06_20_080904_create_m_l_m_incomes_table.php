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
        Schema::create('m_l_m_incomes', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('user_member_id');
            $table->string('position');
            $table->string('product_amount');
            $table->string('transfer_amount');
            $table->string('deviler_date');
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
        Schema::dropIfExists('m_l_m_incomes');
    }
};
