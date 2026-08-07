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
        Schema::create('blog_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_highlight')->nullable();
            $table->text('subtitle')->nullable();
            $table->timestamps();
        });

        // Seed with the existing static values
        DB::table('blog_page_settings')->insert([
            'title' => 'Our',
            'title_highlight' => 'Latest Insights',
            'subtitle' => 'Stay updated with the latest trends in technology, career growth, and professional skill development.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_page_settings');
    }
};
