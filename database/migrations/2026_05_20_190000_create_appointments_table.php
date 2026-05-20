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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->date('appointment_date');
            $table->string('appointment_time');
            $table->text('message')->nullable();
            $table->string('status')->default('pending'); // pending, approved, cancelled
            $table->timestamps();

            // Foreign key to services table
            $table->foreign('service_id')
                  ->references('Serviceid')
                  ->on('services')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
