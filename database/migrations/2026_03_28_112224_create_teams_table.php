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
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('qualification')->nullable();
            $table->string('email')->nullable();
            $table->string('contactno')->nullable();
            $table->string('career')->nullable();
            $table->text('description')->nullable();
            $table->string('profilephoto')->nullable();
            $table->string('experience')->nullable();
            $table->string('status')->default('1');
            $table->string('instagramlink')->nullable();
            $table->string('facebooklink')->nullable();
            $table->string('twitterlink')->nullable();
            $table->string('linkedinlink')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team');
    }
};
