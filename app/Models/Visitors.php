<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Visitors extends Model
{
    protected $table = 'home_visitor';
    protected $fillable = ['nick','ip','country','city','county','isp','system','brower','time'];

    public $timestamps = false;
}
