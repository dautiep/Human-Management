<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    public $timestamp = false;
    protected $fillable = [
        'ten_slider',
        'hinh_slider',
        'noi_dung'
    ];
}
