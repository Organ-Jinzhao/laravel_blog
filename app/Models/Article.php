<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public $table = 'home_article';

    protected $fillable = ['category_id','title','keywords','description','content','thumb','click','author','like'];

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


    //与标签多对多关联
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','home_article_tag','article_id','tag_id');
    }

    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }

}
