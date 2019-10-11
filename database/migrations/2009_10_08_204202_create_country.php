<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('capital', 255)->nullable();
            $table->string('full_name', 255)->nullable();
            $table->string('name', 255)->default('');
            $table->string('country_code', 255)->default('');
            $table->string('currency', 50)->default('');
            $table->string('currency_code', 50)->default('');
            $table->string('currency_sub_unit', 50)->default('');
            $table->string('calling_code', 50)->default('');
            $table->string('currency_symbol', 50)->default('');
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
        Schema::dropIfExists('countries');
    }
}
