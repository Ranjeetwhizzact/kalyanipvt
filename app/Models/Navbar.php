<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Navbar extends Model
{
    use SoftDeletes;

    protected $table = 'navbar';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'type',
        'url',
        'parent_id',
        'alignment',
        'order_no',
        'status',
        'image_path',
        'location',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'id'         => 'integer',
        'parent_id'  => 'integer',
        'order_no'   => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

 
    public function parent()
    {
        return $this->belongsTo(Navbar::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Navbar::class, 'parent_id')->orderBy('order_no');
    }
}
