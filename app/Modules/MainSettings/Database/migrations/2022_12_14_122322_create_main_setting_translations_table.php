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
        Schema::create('main_setting_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_setting_id');
            $table->unique(['main_setting_id', 'locale']);
            $table->foreign('main_setting_id')->references('id')->on('main_settings')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_content')->nullable();
            $table->text('content')->nullable();
            $table->string('meta_keywords')->nullable();
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
        Schema::dropIfExists('main_setting_translations');
    }
};
