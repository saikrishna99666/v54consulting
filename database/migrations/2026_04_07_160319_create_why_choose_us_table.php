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
        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            
            // Mission Tab
            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            $table->json('mission_points')->nullable();
            
            // Vision Tab
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            $table->json('vision_points')->nullable();
            
            // Stats
            $table->string('experience_years')->default('20');
            
            // Buttons and Images
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('image_1')->nullable(); // For the experience counter circle
            $table->string('image_2')->nullable(); // Additional visuals
            $table->string('phone')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us');
    }
};
