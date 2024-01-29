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
        Schema::create('footer_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('footer_id');
            $table->unique(['footer_id', 'locale']);
            $table->foreign('footer_id')->references('id')
                ->on('footer')->onDelete('cascade');
            $table->string('locale')->index();
            $table->text('content')->default('');
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
        Schema::dropIfExists('footer_translations');
    }
};
