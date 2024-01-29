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
        Schema::create('about_section_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('about_section_id');
            $table->unique(['about_section_id', 'locale']);
            $table->foreign('about_section_id')->references('id')
                ->on('about_sections')->onDelete('cascade')->onUpdate('cascade');
            $table->string('locale')->index();
            $table->string('name')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('content')->nullable();
            $table->string('btn_text')->nullable();
            $table->string('btn_url')->nullable();
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
        Schema::dropIfExists('about_section_translations');
    }
};
