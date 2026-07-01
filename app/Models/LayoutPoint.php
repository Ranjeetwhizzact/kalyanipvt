<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayoutPoint extends Model
{
    protected $table = 'layout_points';

    protected $fillable = [
        'page_layouts_id',
        'heading',
        'text',
        'status',
        'created_by',
        'updated_by'
    ];

    public function layout()
    {
        return $this->belongsTo(PageLayout::class, 'page_layouts_id');
    }
}
