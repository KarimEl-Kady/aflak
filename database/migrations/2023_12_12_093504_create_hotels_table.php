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
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ex_id')->nullable();

            $table->timestamps();
        });

        Schema::create('hotel_translations', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('ex_id')->nullable();
            $table->unsignedInteger('hotel_id')->nullable();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('locale')->index()->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels')
            ->onUpdate('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
        Schema::dropIfExists('hotel_translations');

    }
};
