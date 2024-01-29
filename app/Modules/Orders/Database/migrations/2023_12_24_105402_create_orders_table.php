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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_type_id')->nullable();
            $table->foreign('car_type_id')->references('id')->on('car_types')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_plan_id')->nullable();
            $table->foreign('user_plan_id')->references('id')->on('users_plans')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('representative_id')->nullable();
            $table->foreign('representative_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_address_id')->nullable();
            $table->foreign('user_address_id')->references('id')->on('users_addresses')->onDelete('cascade')->onUpdate('cascade');
            $table->date('order_date')->nullable();
            $table->time('order_time')->nullable();
            $table->string('order_status')->default('pending');
            $table->string('payment_status')->default('un paid');
            $table->string('total')->nullable();
            $table->string('coupon')->nullable();
            $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
