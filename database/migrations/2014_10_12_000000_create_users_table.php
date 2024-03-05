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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('email_verifiy')->default(0)->comment('0 => not verified , 1=> is verfied');
            $table->string('verfication_code')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('commercial_register_number')->nullable();
            $table->string('company_website')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('signature_image')->nullable();
            $table->integer('status')->default(0)->comment('0=>not upgraded or uploaded , 1=>contract signning done , 2=>paid and contract signning done , 3=>upgrade accepted , 4=>upgrade refused');
            $table->integer('points')->unsigned()->nullable();
            $table->double('balance')->unsigned()->nullable();
            $table->string('wallet_password')->nullable();

            $table->rememberToken();
            $table->text('api_token')->nullable();
            $table->string('image')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('user_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->text('device_token')->nullable();
            $table->text('device_id')->nullable();
            $table->text('device_type')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
