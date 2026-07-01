<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificatePageSection extends Model
{
    use SoftDeletes;

    protected $table = 'certificate_page_sections';

    protected $fillable = [
        'title',
        'subheading',
        'home_image',
        'page_image',
        'order',
        'image_position',
        'paragraph',
        'point',
        'section_type',
        'is_active',
        'slug',
        'home_title',
        'home_banner',
    ];

    protected $casts = [
        'order' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_at' => 'datetime',
        'point' => 'array',
    ];
}
