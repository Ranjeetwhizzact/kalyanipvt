<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPageSetting extends Model
{
    protected $table = 'blog_page_settings';

    protected $fillable = [
        'title',
        'title_highlight',
        'subtitle',
    ];
}
