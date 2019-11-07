<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleLike extends Model
{

    public $table = 'home_article_like';

    protected $fillable = ['article_id','member_id','visitor_id','status'];

    //文章所属分类
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    //文章所属作者
    public function member()
    {
        return $this->belongsTo('App\Models\Member','author');
    }




    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }

}
