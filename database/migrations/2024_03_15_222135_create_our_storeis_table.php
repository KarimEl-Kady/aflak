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
        Schema::create('our_stories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
        Schema::create('our_story_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('our_story_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('text')->nullable();
            $table->string('label_title')->nullable();
            $table->string('label_text')->nullable();
            $table->foreign('our_story_id')->references('id')->on('our_stories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('our_story_features', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('our_story_id')->nullable();
            $table->timestamps();
        });

        Schema::create('our_story_feature_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('our_story_feature_id')->nullable();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->foreign('our_story_feature_id')->references('id')->on('our_story_features')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('our_story_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('our_story_id')->nullable();
            $table->string('image')->nullable();
            $table->foreign('our_story_id')->references('id')->on('our_stories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_storeis');
        Schema::dropIfExists('our_storey_translations');
        Schema::dropIfExists('our_storey_features');
        Schema::dropIfExists('our_storey_feature_translations');
        Schema::dropIfExists('our_storey_images');
    }
};
