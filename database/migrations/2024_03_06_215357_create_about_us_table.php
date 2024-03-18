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
        Schema::create('about_us', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
        Schema::create('about_us_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('about_us_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('text')->nullable();
            $table->string('locale')->nullable();
            $table->foreign('about_us_id')->references('id')->on('about_us')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('about_us_images'  , function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('about_us_id')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('about_us_features'  , function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('about_us_id')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('about_us_feature_translations'  , function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('about_us_feature_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('text')->nullable();
            $table->string('locale')->nullable();
            $table->foreign('about_us_feature_id')->references('id')->on('about_us_features')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
        Schema::dropIfExists('about_us_translations');
        Schema::dropIfExists('about_us_images');
        Schema::dropIfExists('about_us_features');
        Schema::dropIfExists('about_us_feature_translations');
    }
};
