<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPageSetting extends Model
{
    protected $table = 'contact_page_settings';

    protected $fillable = [
        'heading',
        'description',
        'phone_numbers',
        'emails',
        'address',
        'map_link',
        'call_us_heading',
        'call_us_description',
        'mail_us_heading',
        'mail_us_description'
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'emails' => 'array',
    ];
}
