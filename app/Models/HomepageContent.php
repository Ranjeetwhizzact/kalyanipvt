<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    use HasFactory;

    protected $table = 'homepage_contents';

    protected $fillable = [
        'section_type',
        'title',
        'subtitle',
        'value',
        'url',
        'icon',
        'image',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'value' => 'array',
        'is_active' => 'boolean',
    ];
}
