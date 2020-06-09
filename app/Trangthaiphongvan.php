<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trangthaiphongvan extends Model
{
    protected $table = 'trangthaiphongvan';
    public $timestamp = false;
    protected $fillable = [
        'ten_trangthai_phongvan'
    ];

    public function ungvien()
    {
        return $this->hasMany('App\Ungvien', 'id_trangthaiphongvan', 'id');
    }
}
