<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionItem extends Model
{
    use SoftDeletes;

    protected $table = 'section_items';
    protected $fillable = [
        'section_id',
        'title',
        'description',
    ];
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
