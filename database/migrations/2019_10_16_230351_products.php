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
            $table->bigIncrements('business_id');
            $table->string('name');
            $table->Text('short_description');
            $table->string('brand_name');
            $table->decimal('price',9,2);
            $table->integer('discount')->nullable();
            $table->string('phone_number');
            $table->json('size')->nullable();
            $table->json('color')->nullable();
            $table->text('product_description');
            $table->text('product_specification');
            $table->text('shipping_information');
            $table->text('return_policy_1');
            $table->text('warranty_information');
            $table->text('return_policy_2');
            $table->json('images')->nullable();
            $table->timestamps();

            $table->foreign('business_id')->references('id')->on('business');
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
