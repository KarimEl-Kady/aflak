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
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->date('expired_at')->nullable();
            $table->string('currency')->nullable();  //remain_time

            $table->string('remain_time')->nullable();

            $table->string('status')->default(0)->comment('0 => pending , 1 => Accepted');
            $table->string('price')->nullable();
            $table->timestamps();
            $table->foreign('request_id')->references('id')->on('requests')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });

        Schema::create('offer_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('offer_id')->nullable();


            $table->string('describtion')->nullable();

            $table->string('locale')->nullable()->index();
            $table->foreign('offer_id')->references('id')->on('offers')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('offer_services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('offer_id')->nullable();
            $table->text('title')->nullable();
            $table->foreign('offer_id')->references('id')->on('offers')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('offer_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('offer_id')->nullable();
            $table->string('asset')->nullable();
            $table->foreign('offer_id')->references('id')->on('offers')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
        Schema::dropIfExists('offer_translations');
        Schema::dropIfExists('offer_services');
    }
};
