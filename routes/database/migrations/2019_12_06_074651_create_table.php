<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('level');
        });

        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->dateTime('date_order');
            $table->double('total');
            $table->string('payment');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->double('unit_price');
            $table->double('promotion_price');
            $table->string('image');
            $table->timestamps();

        });

        Schema::create('bill_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bill')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('quantity');
            $table->double('unit_price');
            $table->timestamps();
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('id_bill')->references('id')->on('bills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('bills');
        Schema::dropIfExists('bill_detail');
        Schema::dropIfExists('products');
    }
}
