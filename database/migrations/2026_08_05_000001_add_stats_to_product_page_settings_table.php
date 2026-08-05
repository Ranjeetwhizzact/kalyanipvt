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
            $table->text('map_paragraph')->nullable()->after('subtitle');
            $table->string('stat1_label')->nullable()->after('map_paragraph');
            $table->string('stat1_value')->nullable()->after('stat1_label');
            $table->string('stat2_label')->nullable()->after('stat1_value');
            $table->string('stat2_value')->nullable()->after('stat2_label');
            $table->string('stat3_label')->nullable()->after('stat2_value');
            $table->string('stat3_value')->nullable()->after('stat3_label');
        });

        // Seed with the existing static values
        DB::table('product_page_settings')->whereNull('map_paragraph')->update([
            'map_paragraph' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'stat1_label' => 'Distributor',
            'stat1_value' => '20+',
            'stat2_label' => 'Served Country',
            'stat2_value' => '34k+',
            'stat3_label' => 'Product Category',
            'stat3_value' => '10k+',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_page_settings', function (Blueprint $table) {
            $table->dropColumn([
                'map_paragraph',
                'stat1_label',
                'stat1_value',
                'stat2_label',
                'stat2_value',
                'stat3_label',
                'stat3_value',
            ]);
        });
    }
};
