<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionContent extends Model
{
    //
     protected $table = 'section_content';
    protected $fillable = ['section_id','heading','description','image_url'];
}
