<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageStat extends Model
{
    protected $table = 'homepage_stats';

    protected $fillable = [
        'title',
        'subtitle',
        'value',
        'is_active',
        'section_heading',
        'section_description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
