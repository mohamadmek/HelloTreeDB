<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brochure extends Model
{
    protected $table = 'brochures';
    
    protected $fillable = [
        'title', 'text',
    ];
}
