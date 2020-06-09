<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nguonjob extends Model
{
    protected $table = 'nguonjob';
    public $timestamp = false;
    protected $fillable = [
        'ten_nguonjob'
    ];

    public function ungvien()
    {
        return $this->hasMany('App\Ungvien', 'id_nguonjob', 'id');
    }
}
