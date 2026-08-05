<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product_page_settings', function (Blueprint $table) {
            $table->string('map_image')->nullable()->after('map_paragraph');
        });

        // Seed with the existing static background image
        DB::table('product_page_settings')->whereNull('map_image')->update([
            'map_image' => '/map-base.png',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_page_settings', function (Blueprint $table) {
            $table->dropColumn('map_image');
        });
    }
};
