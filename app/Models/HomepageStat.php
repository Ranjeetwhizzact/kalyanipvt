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
        'section_description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
