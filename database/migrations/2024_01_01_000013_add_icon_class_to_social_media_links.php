<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('social_media_links', function (Blueprint $table) {
            $table->string('icon_class')->nullable()->after('icon')
                  ->comment('Remix Icon class e.g. ri-facebook-circle-fill');
        });
    }

    public function down(): void
    {
        Schema::table('social_media_links', function (Blueprint $table) {
            $table->dropColumn('icon_class');
        });
    }
};
