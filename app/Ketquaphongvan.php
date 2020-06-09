<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ketquaphongvan extends Model
{
    protected $table = 'ketquaphongvan';
    public $timestamp = false;
    protected $fillable = [
        'ten_ketqua_phongvan'
    ];

    public function ungvien()
    {
        return $this->hasMany('App\Ungvien', 'id_ketquaphongvan', 'id');
    }
}
