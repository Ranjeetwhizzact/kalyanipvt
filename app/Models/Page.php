<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'slug',
        'status'
    ];

    public function sections()
    {
        return $this->hasMany(PageSection::class, 'page_id');
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'page_id');
    }
}
