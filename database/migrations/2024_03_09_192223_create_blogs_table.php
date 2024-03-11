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
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('blog_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blog_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('locale')->index();
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('blog_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blog_id')->nullable();
            $table->unsignedInteger('section_id')->nullable();

            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('blog_hashtags', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blog_id')->nullable();
            $table->unsignedInteger('hashtag_id')->nullable();

            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->foreign('hashtag_id')->references('id')->on('hashtags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
