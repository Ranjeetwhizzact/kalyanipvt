<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPageSetting extends Model
{
    protected $table = 'product_page_settings';

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'show_home_button',
    ];
}
