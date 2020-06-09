<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trinhdovanhoa extends Model
{
    protected $table = 'trinhdovanhoa';
    public $timestamp = false;
    protected $fillable = [
        'ten_trinhdovanhoa'
    ];

    public function ungvien()
    {
        return $this->hasMany('App\Ungvien', 'id_trinhdovanhoa', 'id');
    }
}
