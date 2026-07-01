<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{

    protected $table = 'blog_posts';

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'featured_image',
        'author_id',
        'category_id',
        'reading_time',
        'views_count',
        'status',
        'is_active',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
    ];
}
