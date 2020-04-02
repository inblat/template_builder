<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    const LOC_EN = 'en';
    const LOC_RU = 'ru';
    
    protected $fillable = [
        'page'    
    ];
}
