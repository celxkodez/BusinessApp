<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Store extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            Schema::defaultStringLength(191);
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('type');
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->string('area');
            $table->string('city');
            $table->string('state');
            $table->string('LGA');
            $table->unsignedBigInteger('country');
            $table->date('year_started');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('country')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store');
    }
}
