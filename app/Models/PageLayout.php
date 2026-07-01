<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageLayout extends Model
{
    protected $table = 'page_layouts';

    protected $fillable = [
        'page_section_id',
        'image',
        'heading',
        'heading_color',
        'subheading',
        'subheading_color',
        'paragraph',
        'point_type',
        'order',
        'link_text',
        'link_url',
        'text_colors',
        'text_alignment',
        'status',
        'created_by',
        'updated_by'
    ];

    public function section()
    {
        return $this->belongsTo(PageSection::class, 'page_section_id');
    }

    public function points()
    {
        return $this->hasMany(LayoutPoint::class, 'page_layouts_id');
    }
}
