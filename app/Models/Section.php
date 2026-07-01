<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    protected $table = 'sections';

    protected $fillable = [
        'section_key',
        'title',
        'content',
        'type',
        'image',
        'image_md',
        'image_sm',
        'content_image',
    ];

    /**
     * Relationship: One section has many items
     */
    public function items()
    {
        return $this->hasMany(SectionItem::class);
    }
}
