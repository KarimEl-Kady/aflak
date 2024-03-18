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
        Schema::create('request_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->timestamps();
        });
        Schema::create('request_section_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_section_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('text')->nullable();
            $table->string('locale')->nullable();
            $table->foreign('request_section_id')->references('id')->on('request_sections')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_sections');
        Schema::dropIfExists('request_section_translations');
    }
};
