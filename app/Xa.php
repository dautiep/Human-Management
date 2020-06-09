<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xa extends Model
{
    protected $table = 'xa';
    public $timestamp = false;
    protected $fillable = [
        'ten_xa',
        'id_huyen',
        'id_tinh'
    ];

    public function tinh()
    {
        return $this->belongsTo('App\Tinh', 'id_tinh', 'id');
    }

    public function huyen()
    {
        return $this->belongsTo('App\Huyen', 'id_huyen', 'id');
    }

    public function ungvien()
    {
        return $this->hasMany('App\Ungvien', 'id_xa', 'id');
    }
}
