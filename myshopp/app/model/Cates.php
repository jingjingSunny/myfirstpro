<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cates extends Model
{
    //
    use SoftDeletes;
    protected $table="cates";
    protected $dates = ['deleted_at'];
}
