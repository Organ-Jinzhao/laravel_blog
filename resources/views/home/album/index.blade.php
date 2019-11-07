
@extends('home.base')

@section('content')

  @include('home/nav')
</header>
<link rel="stylesheet" type="text/css" href="{{asset('/home/css/image.css')}}" />
<h1 class="t_nav"><span>这里有你喜欢的博客空间导航条图片，快收藏！</span><a href="#" class="n2">导航条下载</a></h1>
<div class="content">
  <div class="iw_wrapper">
    <ul class="iw_thumbs" id="iw_thumbs">
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/3/101683_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/3/101683_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/11/101723_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/11/101723_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/4/110244_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/4/110244_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/0/99104_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/0/99104_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/10/102490_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/10/102490_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/9/103721_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/9/103721_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/12/107436_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/12/107436_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/6/102726_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/6/102726_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/2/102802_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/2/102802_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/13/108429_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/13/108429_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/6/108470_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/6/108470_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/9/102505_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/9/102505_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/5/102485_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/5/102485_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/2/100850_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/2/100850_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/13/100845_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/13/100845_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/12/100860_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/12/100860_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/7/100855_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/7/100855_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/8/100840_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/8/100840_top.jpg" /></a></li>
      <li class="ajax-images"><a target="_blank" href="http://www.lmlblog.com/blog/daxue/" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/14/100830_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/3/100835_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/3/100835_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/5/100821_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/5/100821_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/10/100826_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/10/100826_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/14/107774_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/14/107774_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/2/105698_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/2/105698_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/15/102495_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/15/102495_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/4/102500_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/4/102500_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/15/105247_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/15/105247_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/5/102117_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/5/102117_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/5/103253_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/5/103253_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/15/104591_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/15/104591_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/2/102946_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/2/102946_top.jpg" /></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/3/103603_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/3/103603_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/12/102716_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/12/102716_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/0/109616_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/0/109616_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/15/103839_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/15/103839_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/1/98129_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/1/98129_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/0/102976_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/0/102976_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/5/109637_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/5/109637_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/7/102935_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/7/102935_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/1/106369_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/1/106369_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/5/102965_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/5/102965_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/1/106929_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/1/106929_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/6/97590_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/6/97590_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/11/97595_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/11/97595_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/14/103726_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/14/103726_top.jpg"></a></li>
      <li><a class="fancybox" data-fancybox-group="gallery" href="http://i.gtimg.cn/qzone/space_item/orig/12/106364_top.jpg"><img src="http://i.gtimg.cn/qzone/space_item/orig/12/106364_top.jpg"></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/5/98085_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/5/98085_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/1/103825_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/1/103825_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/0/103856_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/0/103856_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/3/98067_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/3/98067_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/7/98759_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/7/98759_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/5/104197_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/5/104197_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/9/105193_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/9/105193_top.jpg" /></a></li>
      <li class="ajax-images"><a href="http://i.gtimg.cn/qzone/space_item/orig/14/101678_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/14/101678_top.jpg" /></a></li>
      <li class="ajax-images"><a target="_blank" href="http://www.lmlblog.com/wo/" class="fancybox" data-fancybox-group="gallery"><img src="http://www.lmlblog.com/wo/skin/images/banner_top.jpg" alt="个人生活点滴记录博客"/></a></li>
      <li class="ajax-images"><a target="_blank" href="http://www.lmlblog.com/blog/sep/" class="fancybox" data-fancybox-group="gallery"><img src="http://www.lmlblog.com/blog/sep/images/9_top.jpg" alt="别了夏天"/></a></li>
      <li class="ajax-images"><a target="_blank" href="http://www.lmlblog.com/winter/" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/6/104710_top.jpg" /></a></li>      
       <li class="ajax-images"><a target="_blank" href="http://i.gtimg.cn/qzone/space_item/orig/6/102134_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/6/102134_top.jpg" /></a></li>
      <li class="ajax-images"><a target="_blank" href="http://i.gtimg.cn/qzone/space_item/orig/14/104766_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/14/104766_top.jpg" /></a></li>
      <li class="ajax-images"><a target="_blank" href="http://i.gtimg.cn/qzone/space_item/orig/3/104771_top.jpg" class="fancybox" data-fancybox-group="gallery"><img src="http://i.gtimg.cn/qzone/space_item/orig/3/104771_top.jpg" /></a></li>
      <div class="post-nav-inside">
        <div class="post-nav-left"></div>
        <div class="post-nav-right"><a href="/" >点击下载博客素材</a></div>
      </div>
    </ul>
  </div>
</div>
<div class="blank"></div>


<script type="text/javascript">
var ias = $.ias({
    container: "#iw_thumbs", //包含所有文章的元素
    item: ".ajax-images", //文章元素
    pagination: ".post-nav-inside", //分页元素
    next: ".post-nav-right a", //下一页元素
});
 
ias.extension(new IASTriggerExtension({
    text: '<span class="ajax-more">点击下载博客素材</span>', //此选项为需要点击时的文字
    offset: 1, //设置此项后，到 offset+1 页之后需要手动点击才能加载，取消此项则一直为无限加载
}));
ias.extension(new IASSpinnerExtension());
ias.extension(new IASNoneLeftExtension({
    text: ' ', // 加载完成时的提示
}));
</script>

<script>
$("a.ico_v.ico_emotion").click(function(){
if($("#js_emotion").css("display")=="none"){
$("#js_emotion").show();
}else{
$("#js_emotion").hide();
}
});
</script>
<!-- ajax加载评论 -->
<!-- 文章加载 -->
<script type="text/javascript">
 $(document).ready(function (){
var ias = $.ias({
    container: ".blogitem", //包含所有文章的元素
    item: "article", //文章元素
    pagination: ".post-nav-inside", //分页元素
    next: ".post-nav-right a", //下一页元素
});

ias.extension(new IASTriggerExtension({
    text: '<span class="ajax-more">加载更多</span>', //此选项为需要点击时的文字
    offset: 1, //设置此项后，到 offset+1 页之后需要手动点击才能加载，取消此项则一直为无限加载
}));
ias.extension(new IASSpinnerExtension());
ias.extension(new IASNoneLeftExtension({
    text: ' ', // 加载完成时的提示
}));
 });
</script>
<!-- 喜欢 -->
<script type="text/javascript">
 $.fn.postLike = function() {
 // if ($(this).hasClass('done')) {
 // return false;
 // } else {
 $(this).addClass('done');
 var id = $(this).data("id"),
 action = $(this).data('action'),
 rateHolder = $(this).children('.count');
 var ajax_data = {
 action: "bigfa_like",
 um_id: id,
 um_action: action
 };
 $.post("/wp-admin/admin-ajax.php", ajax_data,
 function(data) {
 $(rateHolder).html(data);
 });
 return false;
 // }
};
$(document).on("click", ".favorite",
function() {
 $(this).postLike();
});
</script>
<!-- 头部菜单 -->
<script type="text/javascript">
jQuery(document).ready(function($) {
$('#nav li').hover(function() {
$('ul', this).slideDown(0)},
function() {
$('ul', this).slideUp(0)});
});
</script>
<!-- 返回顶部 -->
<a href="#0" class="cd-top cd-is-visible"></a>
<!-- 分享 -->
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<!-- 手机页面结束 -->
@endsection