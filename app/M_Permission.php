<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['name', 'guard_name'];
}
