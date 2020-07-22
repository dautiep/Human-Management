<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duan extends Model
{
    protected $table = 'duan';
    public $timestamp = false;
    protected $fillable = [
        'ten_du_an',
        'slug',
        'quymo_tbinh',
        'mota_duan',
        'thoigian_batdau',
        'thoigian_ketthuc',
        'id_user',
        'hinh_duan'
    ];

    public function job()
    {
        return $this->hasMany('App\Job', 'id_duan', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
