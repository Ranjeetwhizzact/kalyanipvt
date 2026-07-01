<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMediaLinks extends Model
{
    protected $table = 'social_media_links';
    protected $fillable = [
        'name',
        'url',
        'icon',
        'display_order',
        'is_active',
    ];
}
