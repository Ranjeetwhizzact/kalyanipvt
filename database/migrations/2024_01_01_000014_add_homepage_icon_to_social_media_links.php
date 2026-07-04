<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('social_media_links', function (Blueprint $table) {
            $table->string('homepage_icon')->nullable()->after('icon_class');
            $table->string('homepage_icon_class')->nullable()->after('homepage_icon');
        });
    }

    public function down(): void
    {
        Schema::table('social_media_links', function (Blueprint $table) {
            $table->dropColumn(['homepage_icon', 'homepage_icon_class']);
        });
    }
};
