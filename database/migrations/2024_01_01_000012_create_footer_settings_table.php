<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();
            $table->string('copyright_text')->nullable();
            $table->string('privacy_policy_url')->nullable();
            $table->string('terms_of_use_url')->nullable();
            $table->timestamps();
        });

        // Insert default row
        DB::table('footer_settings')->insert([
            'copyright_text'      => '© 2007-2024 All Rights Reserved with Kalyani Industries Limited.',
            'privacy_policy_url'  => '#',
            'terms_of_use_url'    => '#',
            'created_at'          => now(),
            'updated_at'          => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};
