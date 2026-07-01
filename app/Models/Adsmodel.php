<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
class Adsmodel extends Model
{
    //
    use HasFactory;

    protected $table = 'admodel';

    protected $fillable = [
        'banner',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
