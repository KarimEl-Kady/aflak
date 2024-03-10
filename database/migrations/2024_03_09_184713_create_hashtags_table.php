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
        Schema::create('hashtags', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('hashtag_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hashtag_id')->nullable();
            $table->string('title')->nullable();
            $table->string('locale')->index();
            $table->foreign('hashtag_id')->references('id')->on('hashtags')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hashtags');
    }
};
