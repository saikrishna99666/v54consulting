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
        Schema::create('service_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Serviceid');
            $table->string('image')->nullable();
            $table->string('caption')->nullable();
            $table->timestamps();

            $table->foreign('Serviceid')->references('Serviceid')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_galleries');
    }
};
