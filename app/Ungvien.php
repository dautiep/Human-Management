<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ungvien extends Model
{
    protected $table = 'ungvien';
    public $timestamp = false;
    protected $fillable = [
        'ma_ungvien',
        'ho_ten',
        'gioi_tinh',
        'ngay_sinh',
        'so_dien_thoai',
        'email',
        'sonha',
        'id_xa',
        'id_huyen',
        'id_tinh',
        'id_nguonjob',
        'id_job',
        'id_chucdanh',
        'id_trinhdovanhoa',
        'id_trangthai_phongvan',
        'id_ketqua_phongvan'
    ];

    public function xa()
    {
        return $this->belongsTo('App\Xa', 'id_xa', 'id');
    }

    public function huyen()
    {
        return $this->belongsTo('App\Huyen', 'id_huyen', 'id');
    }

    public function tinh()
    {
        return $this->belongsTo('App\Tinh', 'id_tinh', 'id');
    }

    public function nguonjob()
    {
        return $this->belongsTo('App\Nguonjob', 'id_nguonjob', 'id');
    }

    public function job()
    {
        return $this->belongsTo('App\Job', 'id_job', 'id');
    }

    public function chucdanh()
    {
        return $this->belongsTo('App\ChucDanh', 'id_chucdanh', 'id');
    }

    public function trinhdovanhoa()
    {
        return $this->belongsTo('App\Trinhdovanhoa', 'id_trinhdovanhoa', 'id');
    }

    public function trangthaiphongvan()
    {
        return $this->belongsTo('App\Trangthaiphongvan', 'id_trangthaiphongvan', 'id');
    }

    public function ketquaphongvan()
    {
        return $this->belongsTo('App\Ketquaphongvan', 'id_ketquaphongvan', 'id');
    }
}
