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
        Schema::create('privacies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('privacy_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('privacy_id')->nullable();
            $table->string('locale')->index();
            $table->longText('text')->nullable();
            $table->foreign('privacy_id')->references('id')->on('privacies')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacies');
    }
};
