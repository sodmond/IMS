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
        Schema::create('invoices', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('order_id');
            $table->string('cost_per_each');
            $table->double('total_cost');
            $table->double('shipping_fee')->default(0);
            $table->double('tax')->default(0);
            $table->double('discount')->default(0);
            $table->string('lead_times')->nullable();
            $table->boolean('status')->default(0);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
