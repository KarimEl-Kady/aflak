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

        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('hotel_id')->nullable();
            $table->unsignedInteger('accept_request_id')->nullable();
            $table->date('checkin')->nullable();
            $table->date('checkout')->nullable();
            $table->string('remaining_time')->nullable();

            $table->integer('count_persons')->nullable();
            $table->integer('count_rooms')->nullable();
            $table->string('offer_sit')->default(0)->comment('0=>no offers , 1=>offered , 2=>cancelled , 3=>accepted');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('request_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_id')->nullable();

            $table->string('hotel_name')->nullable();
            $table->string('hotel_address')->nullable();
            $table->string('locale')->nullable()->index();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('request_id')->references('id')->on('requests')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('request_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_id')->nullable();
            $table->unsignedInteger('request_id')->nullable();
            $table->string('room_name')->nullable();
            $table->integer('room_count')->nullable();
            $table->foreign('request_id')->references('id')->on('requests')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
        Schema::dropIfExists('request_translations');
    }
};
