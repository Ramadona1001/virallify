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
        Schema::create('car_type_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_type_id');
            $table->unique(['car_type_id', 'locale']);
            $table->foreign('car_type_id')->references('id')
                ->on('car_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale')->index();
            $table->string('name')->unique();
            $table->string('content')->nullable();
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
        Schema::dropIfExists('car_type_translations');
    }
};
