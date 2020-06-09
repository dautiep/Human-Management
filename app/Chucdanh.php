<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chucdanh extends Model
{
    protected $table = 'chucdanh';
    public $timestamp = false;
    protected $fillable = [
        'ma_chuc_danh',
        'ten_chuc_danh'
    ];

    public function ungvien()
    {
        return $this->hasMany('App\Ungvien', 'id_job', 'id');
    }
}
