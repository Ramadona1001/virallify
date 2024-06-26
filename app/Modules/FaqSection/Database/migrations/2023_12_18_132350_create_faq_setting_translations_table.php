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
        Schema::create('faq_setting_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faq_setting_id');
            $table->unique(['faq_setting_id', 'locale']);
            $table->foreign('faq_setting_id')->references('id')
                ->on('faq_settings')->onDelete('cascade');
            $table->string('locale')->index();
            $table->longText('question')->nullable();
            $table->longText('answer')->nullable();
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
        Schema::dropIfExists('faq_setting_translations');
    }
};
