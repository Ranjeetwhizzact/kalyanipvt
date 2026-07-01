<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
     protected $hidden = [
        'attribute_name',
        'is_active',
        'created_at',
        'updated_at',
     ];
     protected $fillable = [
        'created_at',
        'updated_at',
     ];
     protected $table = 'attribute';
}
