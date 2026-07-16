<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'video_path',
        'video_type',
        'thumbnail_path',
        'description',
        'sequence_no',
        'is_active',
    ];
}
