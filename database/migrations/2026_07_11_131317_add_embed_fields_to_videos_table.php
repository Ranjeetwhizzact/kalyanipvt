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
        Schema::table('videos', function (Blueprint $table) {
            $table->string('video_path')->nullable()->change();
            $table->string('video_type')->default('file')->after('video_path');
            $table->string('thumbnail_path')->nullable()->after('video_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('video_path')->nullable(false)->change();
            $table->dropColumn(['video_type', 'thumbnail_path']);
        });
    }
};
