<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\HomebaseController;
use App\Models\Article;
use App\Models\ArticleLike;
use Illuminate\Support\Facades\Redis;


class ArticleController extends HomebaseController
{
    //设置分页长度
    public static $page = 3;

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->offset(0)->limit(self::$page)->get()->toArray();
        foreach ($articles as $key => $article) {
            $articles[$key]['created_at'] = date('Y/m/d', strtotime($article['created_at']));
            $articles[$key]['updated_at'] = date('Y/m/d', strtotime($article['updated_at']));
            $articles[$key]['content'] = self::getSummary($article['content']);
        }
        return view('home.article.index', compact('articles'));
    }

    public function more(Request $request)
    {
        $page = $request->input('id');
        $more_article = Article::orderBy('created_at', 'desc')->offset($page*self::$page)->limit(self::$page)->get()->toArray();
        foreach ($more_article as $key => $article) {
            $more_article[$key]['created_at'] = date('Y/m/d', strtotime($article['created_at']));
            $more_article[$key]['updated_at'] = date('Y/m/d', strtotime($article['updated_at']));
            $more_article[$key]['content'] = self::getSummary($article['content']);
        }
        return response($more_article);
    }

    public function content($id)
    {
        $article = Article::with(['member'])->where('id', $id)->first();
        $user = unserialize(Redis::get('user'));

        //如果没有设置点击量哈希表，就设置一下
        if(!Redis::hexists("article_click" , $article->id)){
            Redis::hset('article_click',$article->id,$article->click);
        }
        //如果访问记录没有，设置点击量并且点击量加1
        if(!Redis::exists('visitor'.$article->id.$user['ip'])) {
            //访问记录设置为1小时
            Redis::setex('visitor'.$article->id.$user['ip'],3600,'isview');
            //对文章阅读量累加
            Redis::hincrby('article_click' , $article->id, 1);
        }
        //获取点击量
        $click = Redis::hget('article_click',$article->id);
        $pre = Article::select('id', 'title')->where('id', '<', $id)->orderBy('id', 'desc')->first();
        $next = Article::select('id', 'title')->where('id', '>', $id)->orderBy('id', 'asc')->first();
        return view('home.article.content', compact('article', 'click','pre', 'next'));
    }

    public function like(Request $request)
    {
        $data['article_id'] = $request->input('id');
        $user = unserialize(Redis::get('user'));
        $data['visitor_id'] = $user['id'];
        if ($request->input('action') == 'add') {
            //查找用户有点赞表
            $like = ArticleLike::where($data)->first();
            $data['status'] = 1;
            if($like ) {
                $articlelike = ArticleLike::findOrFail($like->id);
                //更新
                $articlelike->update($data);
            }else{
                //创建喜欢记录
                ArticleLike::create($data);
            }
            //加赞
            Article::where('id', $data['article_id'])->increment('like');
        }else{
            ArticleLike::where($data)->update(['status'=>2]);

            Article::where('id', $data['article_id'])->decrement('like');
        }
        $sum = Article::find($data['article_id']);
        return response($sum->like);

    }

    //文章截取
    private function getSummary($content, $s = 0, $e = 150, $char = 'utf-8')
    {
        if (empty($content)) {
            return null;
        }
        return (mb_substr(str_replace('&nbsp;', '', strip_tags($content)), $s, $e, $char));
    }


}
