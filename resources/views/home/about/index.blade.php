
@extends('home.base')

@section('content')
    
        @include('home/nav')

    <style type="text/css">
        body {background: url({{ asset('/home/images/about-bg.jpg')}});}
        .blogitem{float: inherit;margin: auto;}
        .title {
            background: 0;
            text-align: center;
            padding-left: 0;
            padding-right: 0;
        }
        .title p{margin: 15px 0;}
        .textfoot{box-shadow: #999 0px 2px 3px;}
        .blogitem article {
            border-bottom: 0;
            box-shadow: #999 0px 2px 3px;
            margin-bottom: 10px;
        }
        h2.title img {
            border-radius: 100%;
        }
        h1.t_nav{width: inherit;}
        .mainContent {background: 0;margin: 0px auto 0px;}
        .textfoot { text-align: left;padding: 20px 25px 85px; }
        .about-bg{background: url({{ asset('/home/images/about-bg.jpg')}});}
        .title a:hover {
            padding: 0;
        }
        .post-like {
            float: right;
            margin-right: 55px;
        }
        .post-like a {
            background: url({{ asset('/home/images/meigui.png')}});
            cursor: pointer;
            background-size: 40px;
            width: 60px;
            height: 45px;
            margin-right: 15px;
            background-position: left;
            background-repeat: no-repeat;
        }
        .post-like .count {
            margin-top: 10px;
        }
        .title{width: 100%;}

        footer{margin-top: 0px;}
    </style>

    <div class="about-bg">
        <div class="mainContent">
            <div style="position: absolute;right: 40px;"> <img src="{{asset('home/images/music.png')}}" border="0">
                <p style="text-align: center;">
                    <embed wmode="transparent" width="25" height="20" src="http://www.lmlblog.com/time/images/singlemp3player.swf?file=http://www.lmlblog.com/time/images/mengxianglvxing.mp3
&repeatPlay=true&songVolume=30&autoStart=true"
                           type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
                </p>
            </div>
            <div class="blogitem">
                <h1 class="t_nav"><span>记录我的人生轨迹， 记录我的感动，记录心中那尚未崩坏的部分。</span><a href="#" class="n2">关于我</a></h1>
                <article>
                    <h2 class="title"> <img src="{{$info->avatar}}" style="width: 133px;height: 133px;">
                        <p>{{$info->name}}</p>
                        <div class="v-address">{{$info->city}}·{{$info->area}}</div>
                        <m class="post-like"> <a id="flower" href="javascript:;" data-action="ding" data-id="98" class="favorite"> <span class="count"> 666</span> </a> </m>
                    </h2>
                    <ul class="text">
                        <p>{{$info->summary}}<br>——www.lmlblog.com</p>
                    </ul>
                    <div class="textfoot">
                        <div class="weixin" href="javascript:void(0);" id="qr-weixin"></div>
                        <a href="http://qq.com" target="_blank">
                            <div class="qq"></div>
                        </a> <a href="http://qzone.qq.com" target="_blank">
                            <div class="qqzone"></div>
                        </a> <a href="http://weibo.com" target="_blank">
                            <div class="weibo"></div>
                        </a><a href="http://douban.com" target="_blank">
                            <div class="douban"></div>
                        </a><a href="http://taobao.com" target="_blank">
                            <div class="taobao"></div>
                        </a> <a href="http://zhihu.com" target="_blank">
                            <div class="zhihu"></div>
                        </a> <a href="http://renren.com" target="_blank">
                            <div class="renren"></div>
                        </a><a href="http://tieba.com" target="_blank">
                            <div class="tieba"></div>
                        </a> </div>
                </article>
            </div>
        </div>
    </div>
@endsection
