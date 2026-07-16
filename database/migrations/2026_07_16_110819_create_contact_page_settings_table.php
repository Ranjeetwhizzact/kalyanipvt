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
        Schema::create('contact_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->text('description')->nullable();
            $table->string('call_us_heading')->nullable();
            $table->text('call_us_description')->nullable();
            $table->string('mail_us_heading')->nullable();
            $table->text('mail_us_description')->nullable();
            $table->timestamps();
        });

        // Seed default values
        DB::table('contact_page_settings')->insert([
            'heading' => 'Get In Touch',
            'description' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.',
            'call_us_heading' => 'call us',
            'call_us_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ex repudiandae iure, accusantium beatae minus?',
            'mail_us_heading' => 'Mail Us',
            'mail_us_description' => 'Lorem ipsum is placeholder text commonly used in the graphic,',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_page_settings');
    }
};
