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
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type')->default(0)->comment('0 => general , 1=> notification_user_from_specific_action');
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });


        Schema::create('notification_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->unsignedInteger('notification_id')->nullable()->index();
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('notification_id')->references('id')->on('notifications')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
