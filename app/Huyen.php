<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
    protected $table = 'huyen';
    public $timestamp = false;
    protected $fillable = [
        'ma_huyen',
        'ten_huyen',
        'id_tinh'
    ];

    public function tinh()
    {
        return $this->belongsTo('App\Tinh', 'id_tinh', 'id');
    }

    public function xa()
    {
        return $this->hasMany('App\Xa', 'id_huyen', 'id');
    }

    public function ungvien()
    {
        return $this->hasMany('App\Ungvien', 'id_huyen', 'id');
    }
}
