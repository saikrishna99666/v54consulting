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
        Schema::create('contactus', function (Blueprint $table) {
            $table->id('contactid');
            $table->string('Firstname')->nullable();
            $table->string('Lastname')->nullable();
            $table->string('Phoneno')->nullable();
            $table->string('EmailAddress')->nullable();
            $table->string('Location')->nullable();
            $table->text('Message')->nullable();
            $table->string('Qualification')->nullable();
            $table->string('visastatus')->nullable();
            $table->string('country')->nullable();
            $table->string('whatsapp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactus');
    }
};
