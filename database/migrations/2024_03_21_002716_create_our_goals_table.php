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
        Schema::create('our_goals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->timestamps();
        });
        Schema::create('our_goal_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('our_goal_id');
            $table->string('locale')->index();
            $table->longText('text')->nullable();
            $table->foreign('our_goal_id')->references('id')->on('our_goals')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('our_goal_features', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('our_goal_feature_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('our_goal_feature_id')->nullable();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->foreign('our_goal_feature_id')->references('id')->on('our_goal_features')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_goals');
        Schema::dropIfExists('our_goal_translations');
        Schema::dropIfExists('our_goal_features');
        Schema::dropIfExists('our_goal_feature_translations');
    }
};
