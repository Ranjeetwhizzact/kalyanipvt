<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('footer_settings', function (Blueprint $table) {
            $table->string('youtube_label')->nullable()->after('terms_of_use_url')
                  ->default('For more Video visit our YouTube Channel');
            $table->string('youtube_url')->nullable()->after('youtube_label');
            $table->string('youtube_channel_name')->nullable()->after('youtube_url');
        });
    }

    public function down(): void
    {
        Schema::table('footer_settings', function (Blueprint $table) {
            $table->dropColumn(['youtube_label', 'youtube_url', 'youtube_channel_name']);
        });
    }
};
