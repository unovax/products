<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('client_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('client_id')->on('clients');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->integer('quantity');
            $table->boolean('status');
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
        Schema::dropIfExists('clients');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('products');
    }
}
