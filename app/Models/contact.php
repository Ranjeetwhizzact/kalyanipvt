<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact_detail';

    protected $fillable = [
        'contact_number',
        'whatsapp_number',
        'mail',
        'status'
    ];
}
