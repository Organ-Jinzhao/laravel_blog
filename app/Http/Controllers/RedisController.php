<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use App\Models\Article;



class RedisController extends Controller
{

    public function getArticle(){

    }

    public function saveArticle(){
        $ids = Redis::hkeys('article_click');
        $clicks =  Redis::hvals('article_click');
        $log = "\r\n"."存入点击量redis-------";
        foreach($ids as $key=>$id){
            Article::where('id',$id)->update(  ['click' => $clicks[$key]]);
            $log.='  '.$id."=".$clicks[$key]."  ";
        }
        $dir = './log/article_clike/'.date('Ymd');
        self::write_log($dir,$log);
        //删除点击量key
        Redis::del('article_click');
    }

}
