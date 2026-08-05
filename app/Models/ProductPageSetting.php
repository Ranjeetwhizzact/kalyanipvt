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
        'map_paragraph',
        'map_image',
        'stat1_label',
        'stat1_value',
        'stat2_label',
        'stat2_value',
        'stat3_label',
        'stat3_value',
    ];
}
