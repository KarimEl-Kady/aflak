<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('logistic_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->timestamps();
        });
        Schema::create('logistic_section_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('logistic_section_id');
            $table->string('locale')->index();
            $table->string('first_text')->nullable();
            $table->string('second_text')->nullable();
            $table->foreign('logistic_section_id')->references('id')->on('logistic_sections')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistic_sections');
    }
};
