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
        Schema::create('advantages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->timestamps();
        });
        Schema::create('advantage_translations', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('advantage_id')->nullable();
           $table->string('title')->nullable();
           $table->string('text')->nullable();
           $table->string('locale')->nullable();
           $table->foreign('advantage_id')->references('id')->on('advantages')->onDelete('cascade')->onUpdate('cascade');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advantages');
        Schema::dropIfExists('advantage_translations');
    }
};
