<?php

namespace App\Models;
use App\Models\ProductUses;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product_list';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'features',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productUses()
    {
        return $this->hasMany(ProductUses::class, 'product_id');
    }
}
