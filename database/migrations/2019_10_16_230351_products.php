<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('store_id');
            $table->string('name');
            $table->Text('short_description');
            $table->string('brand_name');
            $table->decimal('price', 9, 2);
            $table->integer('discount')->nullable();
            $table->string('phone_number');
            $table->text('product_description');
            $table->text('product_specification');
            $table->text('shipping_information');
            $table->text('return_policy_1');
            $table->text('warranty_information');
            $table->text('return_policy_2');
            // $table->json('images');
            // $table->json('size');
            // $table->json('color');
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('store');
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
}
