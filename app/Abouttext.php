<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abouttext extends Model
{
    protected $table = 'abouttexts';
    
    protected $fillable = [
        'title', 'textfirst', 'titlesecond'
    ];
}
