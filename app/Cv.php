<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $table = 'cv';
    public $timestamps = false;
    protected $fillable = [
        'ho_ten',
        'email',
        'so_dien_thoai',
        'ten_cv',
        'id_job'
    ];

    public function job()
    {
        return $this->belongsTo('App\Job', 'id_job', 'id');
    }
}
