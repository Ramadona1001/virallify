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
        Schema::create('section_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->unique(['section_id', 'locale']);
            $table->foreign('section_id')->references('id')
                ->on('sections')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('section_translations');
    }
};
