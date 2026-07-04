<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $table = 'footer_settings';
    protected $fillable = [
        'copyright_text',
        'privacy_policy_url',
        'terms_of_use_url',
        'youtube_label',
        'youtube_url',
        'youtube_channel_name',
    ];
}
