<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'image',
        'features',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

     public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // Add this relationship
    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id', 'id');
    }
    protected $table = 'subcategory';
}
