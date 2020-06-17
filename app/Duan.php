<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duan extends Model
{
    protected $table = 'duan';
    public $timestamp = false;
    protected $fillable = [
        'slug',
        'ten_du_an',
        'quymo_trungbinh',
        'thoigian_batdau',
        'thoigian_ketthuc'
    ];

    public function job()
    {
        return $this->hasMany('App\Job', 'id_duan', 'id');
    }

    public function user()
    {
        return $this->hasMany('App\User', 'id_duan', 'id');
    }
}
