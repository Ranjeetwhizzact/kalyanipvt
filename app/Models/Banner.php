<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'homepage_banner';
    protected $fillable = [
        'banner_image',
        'title',
        'subtitle',
        'link',
        'is_active',
        'display_order'
    ];
}
