<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUses extends Model
{
    protected $fillable = [
       
        'product_id',
        'attribute_id',	
        'attribute_name',
        'attribute_value',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $table = 'product_uses';
}
