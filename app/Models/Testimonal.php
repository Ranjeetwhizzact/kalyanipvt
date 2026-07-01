<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'image',
        'occupation',
        'message',
        'date',
        'is_active',
        'count',
        'heading',
        'created_at',
        'updated_at'
    ];
    protected $hidden =[
         'created_at',
        'updated_at'
    ];
    protected $table = 'testimonal';
}
