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
        Schema::create('request_section_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->nullable()->comment('1 = load , 2 = freight type');
            $table->timestamps();
        });

        Schema::create('request_section_setting_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_section_setting_id')->nullable();
            $table->string('title')->nullable();
            $table->string('locale')->nullable();

            // Define the foreign key constraint with a custom name
            $table->foreign('request_section_setting_id', 'fk_request_section_setting_translations')
                  ->references('id')->on('request_section_settings')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_section_settings');
    }
};
