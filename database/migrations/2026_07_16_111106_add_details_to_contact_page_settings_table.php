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
        Schema::table('contact_page_settings', function (Blueprint $table) {
            $table->text('phone_numbers')->nullable()->after('description');
            $table->text('emails')->nullable()->after('phone_numbers');
            $table->text('address')->nullable()->after('emails');
            $table->text('map_link')->nullable()->after('address');
        });

        // Seed settings from existing contact details
        $contacts = DB::table('contact_detail')->where('status', 'active')->get();

        $phones = [];
        $emails = [];
        $address = '';
        $mapLink = '';

        foreach ($contacts as $contact) {
            if (!empty($contact->contact_number)) {
                $phones[] = $contact->contact_number;
            }
            if (!empty($contact->whatsapp_number)) {
                $phones[] = $contact->whatsapp_number;
            }
            if (!empty($contact->mail)) {
                $emails[] = $contact->mail;
            }
            if (!empty($contact->address)) {
                $address = $contact->address;
            }
            if (!empty($contact->map_link)) {
                $mapLink = $contact->map_link;
            }
        }

        // Deduplicate
        $phones = array_unique(array_filter($phones));
        $emails = array_unique(array_filter($emails));

        // Update the first settings record
        DB::table('contact_page_settings')->where('id', 1)->update([
            'phone_numbers' => json_encode(array_values($phones)),
            'emails' => json_encode(array_values($emails)),
            'address' => $address ?: 'B/12th Floor, Kailas Business Park, Powai Road, Vikhroli (W), Mumbai-400 079',
            'map_link' => $mapLink ?: 'https://maps.app.goo.gl/yM28fM6z7VpB3PZ7A',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_page_settings', function (Blueprint $table) {
            $table->dropColumn(['phone_numbers', 'emails', 'address', 'map_link']);
        });
    }
};
