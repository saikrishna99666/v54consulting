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
            $table->string('preloader_image')->nullable()->after('logoimage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dynamic_contents', function (Blueprint $table) {
            $table->dropColumn('preloader_image');
        });
    }
};
