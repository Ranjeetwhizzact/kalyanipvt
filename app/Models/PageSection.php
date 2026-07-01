<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $table = 'page_sections';

    protected $fillable = [
        'page_id',
        'section_name',
        'section_heading',
        'section_subheading',
        'section_paragraph',
        'layout_type',  // enum ( full-width , grid-2, grid-3)
        'image_layout', // enum ( top, left, right)
        'sort_order',
        'status',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function layouts()
    {
        return $this->hasMany(PageLayout::class, 'page_section_id');
    }
}
