<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    public $table = 'home_nav';
    protected $fillable = ['name','sort','url','parent_id','image','right_text','left_text'];
   // public $timestamps = false;
    //子分类
    public function childs()
    {
        return $this->hasMany('App\Models\Nav','parent_id','id');
    }

    //所有子类
//    public function allChilds()
//    {
//        return $this->childs()->with('allChilds');
//    }

//    //设置自动更新时间为字符串
//    public function fromDateTime($value){
//        return strtotime(parent::fromDateTime($value));
//    }
//    修改时间字段默认名称
//    const CREATED_AT = 'create_time';
//    const UPDATED_AT = 'update_time';
//      设置不更新updata_at数据；
//    const UPDATED_AT = null;


}
