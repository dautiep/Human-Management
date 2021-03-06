<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';
    public $timestamp = false;
    protected $fillable = [
        'ma_job',
        'ten_job',
        'capbac_vitri',
        'li_do_tuyen',
        'so_luong_tuyen',
        'songay_tieuchuan_vitri',
        'thoigian_offer',
        'thoigian_den_onboard',
        'id_user',
        'id_duan',
        'id_chucdanh',
        'trang_thai',
        'hinh',
        'mo_ta_job'
    ];

    public function duan()
    {
        return $this->belongsTo('App\Duan', 'id_duan', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function chucdanh()
    {
        return $this->belongsTo('App\Chucdanh', 'id_duan', 'id');
    }

    public function ungvien()
    {
        return $this->hasMany('App\Ungvien', 'id_job', 'id');
    }

    public function detail_job()
    {
        return $this->hasMany('App\Detail_job', 'id_job', 'id');
    }

    public function cv()
    {
        return $this->hasMany('App\Cv', 'id_job', 'id');
    }
}
