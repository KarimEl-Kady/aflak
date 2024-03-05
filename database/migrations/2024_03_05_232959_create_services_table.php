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
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->timestamps();
        });
        Schema::create('service_translations', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('service_id')->nullable();
           $table->string('title')->nullable();
           $table->string('text')->nullable();
           $table->string('locale')->nullable();
           $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_translations');
    }
};
