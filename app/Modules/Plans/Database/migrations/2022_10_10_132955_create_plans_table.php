<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            $table->enum('subscription_type' , ['monthly','yearly'])->default('monthly');
            $table->boolean('status')->default(true);
            $table->integer('wash_number')->default(1);
            $table->string('created_by')->default('');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
