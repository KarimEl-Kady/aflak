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
        Schema::create('home_sliders', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();
        });
        Schema::create('home_slider_translations', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('home_slider_id')->nullable();
           $table->string('title')->nullable();
           $table->string('subtitle')->nullable();
           $table->longText('text')->nullable();
           $table->string('locale')->nullable();
           $table->foreign('home_slider_id')->references('id')->on('home_sliders')->onDelete('cascade')->onUpdate('cascade');
           $table->timestamps();
        });

        Schema::create('home_slider_images', function (Blueprint $table) {
           $table->increments('id');
           $table->string('image')->nullable();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_sliders');
        Schema::dropIfExists('home_slider_translations');
        Schema::dropIfExists('home_slider_images');
    }
};
