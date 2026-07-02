<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterLink extends Model
{
    protected $table = 'footer_links';
    protected $fillable = [
        'title',
        'url',
        'column_group',
        'sort_order',
        'is_active',
    ];
}
