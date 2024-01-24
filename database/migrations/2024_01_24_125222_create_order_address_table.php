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
        Schema::create('order_address', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('billing_firstname');
            $table->string('billing_lastname');
            $table->string('billing_company')->nullable();
            $table->string('billing_address');
            $table->string('billing_phone');
            $table->string('shipping_firstname');
            $table->string('shipping_lastname');
            $table->string('shipping_company')->nullable();
            $table->string('shipping_address');
            $table->string('shipping_phone');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_address');
    }
};
