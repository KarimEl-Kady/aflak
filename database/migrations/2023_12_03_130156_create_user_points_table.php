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
        Schema::create('user_points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('points')->unsigned()->nullable();
            $table->integer('type')->default(0)->comment('1=>charge , 2=>pull ');
            $table->string('title')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });

        Schema::create('user_wallets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();

            $table->integer('payment_id')->unsigned()->nullable();
            $table->string('receipt_image')->nullable();
            $table->string('payment_gateway_link')->nullable();


            $table->integer('balance')->unsigned()->nullable();
            $table->integer('type')->default(0)->comment('0 => not increase , 1=> increase');
            $table->string('title')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });

        Schema::create('payment_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wallet_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();

            $table->string('order_receipt_image')->nullable();
            $table->integer('oreder_balance')->unsigned()->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('wallet_id')->references('id')->on('user_wallets')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_points');
    }
};
