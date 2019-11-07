<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\HomebaseController;
use App\Models\Statement;
use Illuminate\Http\Request;


class IndexController extends HomebaseController
{
    //设置分页长度
    public static $page = 4;

    public function index(Request $request)
    {

        $statements=Statement::orderBy('created_at','desc')->offset(0)->limit(self::$page)->get()->toArray();
        foreach ($statements as $key=>$article) {
            $statements[$key]['created_at'] = date('Y-m-d H:i',strtotime($article['created_at']));
            $statements[$key]['updated_at'] = date('Y-m-d H:i',strtotime($article['updated_at']));
        }
        return view('home.index.index',compact('statements'));
    }

    public function more(Request $request){
        $page = $request->input('id');
        $statements=Statement::orderBy('created_at','desc')->offset($page*self::$page)->limit(self::$page)->get()->toArray();
        foreach ($statements as $key=>$article) {
            $statements[$key]['created_at'] = date('Y-m-d H:i',strtotime($article['created_at']));
            $statements[$key]['updated_at'] = date('Y-m-d H:i',strtotime($article['updated_at']));
        }
        return response($statements);
    }
}
