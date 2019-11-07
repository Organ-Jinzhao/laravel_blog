<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    public $table = 'home_statement';

    protected $fillable = ['image','content','click','weather','author','like'];

    //多对一关联用户表
    public function member()
    {
        return $this->belongsTo('App\Models\Member','author');
    }


    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }

}
