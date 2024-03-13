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
        Schema::create('join_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('join_section_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('join_section_id')->nullable();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->longText('text')->nullable();
            $table->foreign('join_section_id')->references('id')->on('join_sections')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('join_sections');
    }
};
