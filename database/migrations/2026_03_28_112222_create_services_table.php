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
        Schema::create('services', function (Blueprint $table) {
            $table->id('Serviceid');
            $table->string('serviceuid')->nullable();
            $table->string('ServicesTitle')->nullable();
            $table->text('ServicesText')->nullable();
            $table->string('servicesUrl')->nullable();
            $table->string('servicesdate')->nullable();
            $table->string('other')->nullable();
            $table->string('navbartext')->nullable();
            $table->string('serviceimage')->nullable();
            $table->string('status')->default('1');
            $table->string('bannervideourl')->nullable();
            $table->string('icon')->nullable();
            $table->string('bannertitle')->nullable();
            $table->string('pagecategory')->nullable();
            $table->string('pagesubcategory')->nullable();
            // SEO Fields
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('seo_image')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
