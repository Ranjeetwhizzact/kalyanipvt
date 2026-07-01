<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateMedia extends Model
{
    protected $fillable = [
        'title',
        'type',
        'file_path',
        'video_url',
        'description',
        'status',
    ];
}
