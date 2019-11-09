@extends('home.base')

@section('content')

    @include('home/nav')

<style type="text/css">
body {background: url({{asset('/home/images/about-bg.jpg')}});}
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
.mainContent {background: 0;padding: 70px 0 70px;width: 730px;margin: auto;}
.textfoot { text-align: left;padding: 20px 25px 85px; }
.about-bg{background: url({{asset('/home/images/about-bg.jpg')}});
    background-repeat: no-repeat;}
section#comments {background: 0;}
.mem_feedlist dd{width: 427px;}
footer {margin-top: 0px;}
#ds-thread #ds-reset .ds-replybox{width:533px}
#ds-thread #ds-reset .ds-powered-by{width:588px}
#ds-thread #ds-reset .ds-account-control{width:180px}
#ds-thread #ds-reset .ds-sort{width:200px}
</style>
<div class="about-bg">
  <div class="mainContent">
    <div style="position: absolute;right: 40px;"> <img src="{{asset('/home/images/music.png')}}" border="0">
      <p style="text-align: center;">
        <embed wmode="transparent" width="25" height="20" src="http://www.lmlblog.com/time/images/singlemp3player.swf?file=http://www.lmlblog.com/time/images/mengxianglvxing.mp3&repeatPlay=true&songVolume=30"
    type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
      </p>
    </div>
    <div id="respond">
      <div class="mem_message lft">
      <div class="visitors">
      <h3><p>最近访客</p></h3>
    <ul class="ds-recent-visitors" data-num-items="66" data-avatar-size="56" ></ul>
<!--多说js加载开始，一个页面只需要加载一次 -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"time520"};
(function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = 'http://static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
})();
</script>
<!--多说js加载结束，一个页面只需要加载一次 -->
</div>
<!--多说js加载结束，一个页面只需要加载一次 -->
        <div style="background: #fff;padding: 10px 10px 0px;box-shadow: #999 2px 2px 3px;">
          <h5> <span class="l">随便说点什么吧！</span> <span class="r"></span> </h5>
<div id="SOHUCS" sid="time" ></div>
<script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
window.changyan.api.config({
appid: 'cytamwv5E',
conf: 'prod_9ded3f796a9a7ff9ba9fc72f58944d14'
});
</script>
          <div id="thread_list"> </div>
        </div>
      </div>
    </div>
    <!-- 评论结束 -->
  </div>
</div>
<!-- about-bg -->
<div class="blank"></div>

@endsection