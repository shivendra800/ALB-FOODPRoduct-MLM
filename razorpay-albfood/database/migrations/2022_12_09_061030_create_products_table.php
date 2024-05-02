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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cate_id');
            $table->string('slug');
            $table->string('name');
            $table->mediumText('small_description');
            $table->longText('description');
            $table->string('cost_price');
            $table->string('original_price');
            $table->string('selling_price');
            $table->string('image');
            $table->string('qty');
            $table->string('original_qty');
            $table->string('tax');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('deals')->default('0');
            $table->mediumText('meta_title');
            $table->mediumText('meta_description');
            $table->mediumText('meta_keywords');
            $table->string('unit');
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
        Schema::dropIfExists('products');
    }
};
