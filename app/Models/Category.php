<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'slug',
        'name',
        'is_active',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get subcategories that belong to this category
     */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }

    /**
     * Get products that belong to this category
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
