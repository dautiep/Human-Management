<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    protected $table = 'tinh';
    public $timestamp = false;
    protected $fillable = [
        'ten_tinh'
    ];

    public function huyen()
    {
        return $this->hasMany('App\Huyen', 'id_tinh', 'id');
    }

    public function xa()
    {
        return $this->hasMany('App\Xa', 'id_tinh', 'id');
    }

    public function ungvien()
    {
        return $this->hasMany('App\Ungvien', 'id_tinh', 'id');
    }

}
