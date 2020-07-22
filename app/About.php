<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    public $timestamp = false;
    protected $fillable = [
        'tong_quan',
        'tam_nhin',
        'su_menh'
    ];
}
