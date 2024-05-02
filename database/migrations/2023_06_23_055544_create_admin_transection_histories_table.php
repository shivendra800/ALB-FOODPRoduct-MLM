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
        Schema::create('admin_transection_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('trasncetion_amt');
            $table->string('trasncetion_per');
            $table->text('product_amt');
            $table->integer('used_admin_sponserid');
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
        Schema::dropIfExists('admin_transection_histories');
    }
};
