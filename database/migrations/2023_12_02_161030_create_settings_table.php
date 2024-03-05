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
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->double('points')->nullable();
            $table->double('post_points')->nullable();
            $table->string('value_of_upgrate')->nullable();
            $table->text("facebook")->nullable();
            $table->text("youtube")->nullable();
            $table->text("twitter")->nullable();
            $table->text("instagram")->nullable();
            $table->text("tiktok")->nullable();
            $table->text("whatsapp")->nullable();
            $table->string("phone")->nullable();

            $table->timestamps();
        });

        Schema::create('setting_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setting_id')->unsigned()->nullable();
            $table->longText('description')->nullable();
            $table->string('locale')->index();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('setting_id')->references('id')->on('settings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
