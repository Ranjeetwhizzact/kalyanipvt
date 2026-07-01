<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'title',
        'slug',
        'section_type',
        'description',
        'image',
        'date',
        'is_active',
        'created_at',
        'updated_at',
    ];
    protected $hidden =[
        'created_at',
        'updated_at',
    ];
    protected $table ='news';
}
