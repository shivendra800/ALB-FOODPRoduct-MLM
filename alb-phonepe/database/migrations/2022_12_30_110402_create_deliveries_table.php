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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
           
            $table->string('name');
            $table->string('phone');
            $table->string('id_proof');
            $table->string('id_proof_no');
            $table->string('email');
            $table->string('password');
            $table->string('id_image');
            $table->string('image');
            $table->string('allot_pinecode');
            $table->string('state');
            $table->string('district');
            $table->string('division');
            $table->string('region');
            $table->string('block');
            
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
        Schema::dropIfExists('deliveries');
    }
};
