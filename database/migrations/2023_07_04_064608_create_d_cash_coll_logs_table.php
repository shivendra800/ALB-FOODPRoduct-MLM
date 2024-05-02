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
        Schema::create('d_cash_coll_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('devilery_id');
            $table->float('recive_amount',8, 2);
            $table->float('total_amount',8, 2);
            $table->float('after_recive_total_amt',8, 2);
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
        Schema::dropIfExists('d_cash_coll_logs');
    }
};
