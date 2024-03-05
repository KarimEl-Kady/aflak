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
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 191)->nullable();
			$table->string('phone', 191)->nullable();
			$table->string('email', 191)->nullable();
			$table->text('password')->nullable();
			$table->string('image', 191)->nullable();
			$table->text('remember_token')->nullable();
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
