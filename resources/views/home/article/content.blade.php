@extends('home.article.public')

@section('left')
    <style type="text/css">
        .c_titile {
            font-size: 22px;
            margin: 20px 0;
            text-align: center;
        }
        .box_c {
            border: #ccc 1px dashed;
            text-align: center;
            padding: 5px 0;
            margin-right: 30px;
            color: #999;
        }
        p {
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
        }
        body {
            font: 14px "宋体", Arial, Helvetica, sans-serif;
            color: #756F71;
        }
        .box_c span {
            margin: 0 10px;
        }
        .box_c {
            border: #ccc 1px dashed;
            text-align: center;
            padding: 5px 0;
            margin: 0 30px;
            color: #999;
        }
        .article{
            padding:30px;
        }
        .content{
            margin-top:20px;
        }

    </style>

        <div class="blogitem ">
            <div class="article">

            <h2 class="c_titile">{{$article->title}}</h2>
            <p class="box_c"><span class="d_time">发布时间：{{$article->created_at}}</span><span>作者：<a href='../../index.html'>{{$article->member->name}}</a></span><span>阅读（{{$click}}）</span></p>
            <div class="content">
                <?php echo $article->content; ?>
            </div>
            <div class="keybq">
                <p><span>关键字词</span>：{{ $article->keywords}}</p>
            </div>
            <div class="nextinfo">
                @if($pre)
                    <p>上一篇：<a href="/article/{{$pre->id}}/content">{{$pre->title}}</a></p>
                @endif
                @if($next)
                    <p>下一篇：<a href="/article/{{$next->id}}/content">{{$next->title}}</a></p>
                    @endif
            </div>
            <div class="otherlink">
                <h2>相关文章</h2>
                <ul>
                    <li><a href="/" title="辞职，遇见更好的自己">辞职，遇见更好的自己</a></li>
                    <li><a href="/" title="人生之旅终是自己">人生之旅终是自己</a></li>
                    <li><a href="/" title="最懂我的，始终还是我自己！(网络转载)">最懂我的，始终还是我自己！(网络转载)</a></li>
                </ul>
            </div>

            </div>
        </div>

@endsection