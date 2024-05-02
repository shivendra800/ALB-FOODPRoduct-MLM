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
        Schema::create('vendor_register', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_name');
            $table->string('shop_name');
            $table->string('shop_email');
            $table->string('shop_address');
            $table->string('shop_city');
            $table->string('shop_state');
            $table->string('shop_country');
            $table->string('shop_pincode');
            $table->string('shop_mobile');
            $table->string('shop_address_proof');
            $table->string('shop_address_proof_image');
            $table->string('shop_business_license_number');
            $table->string('shop_pan_number');
            $table->string('shop_gstno');
            $table->string('v_wallet');
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('vendor_register');
    }
};
