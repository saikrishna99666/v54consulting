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
        Schema::table('seo_settings', function (Blueprint $table) {
            $table->boolean('in_sitemap')->default(true)->after('canonical_url');
            $table->string('sitemap_priority')->default('0.8')->after('in_sitemap');
            $table->string('sitemap_changefreq')->default('weekly')->after('sitemap_priority');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seo_settings', function (Blueprint $table) {
            $table->dropColumn(['in_sitemap', 'sitemap_priority', 'sitemap_changefreq']);
        });
    }
};
