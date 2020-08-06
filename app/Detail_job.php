<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_job extends Model
{
    protected $table = 'detail_job';
    public $timestamps = false;
    protected $fillable = [
        'ten_chitiet',
        'mo_ta_cong_viec',
        'quyen_loi',
        'yeu_cau_cong_viec',
        'thoi_gian_lam_viec',
        'id_job'
    ];

    public function job()
    {
        return $this->belongsTo('App\Job', 'id_job', 'id');
    }
}
