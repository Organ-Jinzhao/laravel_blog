<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Member_info extends Model
{
    protected $table = 'members_info';
    protected $fillable = ['member_id','province','city','area','summary','date','sex'];


    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'id','id');
    }

    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }
}
