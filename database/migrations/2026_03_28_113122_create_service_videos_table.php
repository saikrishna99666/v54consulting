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
        Schema::create('service_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Serviceid');
            $table->string('youtube_url')->nullable();
            $table->string('video_file')->nullable();
            $table->string('video_type')->nullable(); // youtube or upload
            $table->string('title')->nullable();
            $table->timestamps();

            $table->foreign('Serviceid')->references('Serviceid')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_videos');
    }
};
