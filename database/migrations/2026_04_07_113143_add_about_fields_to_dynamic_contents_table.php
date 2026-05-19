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
        Schema::table('dynamic_contents', function (Blueprint $table) {
            $table->string('about_subtitle')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_short_description')->nullable();
            $table->text('about_long_description')->nullable();
            $table->string('about_point_1')->nullable();
            $table->string('about_point_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dynamic_contents', function (Blueprint $table) {
            $table->dropColumn(['about_subtitle', 'about_title', 'about_short_description', 'about_long_description', 'about_point_1', 'about_point_2']);
        });
    }
};
