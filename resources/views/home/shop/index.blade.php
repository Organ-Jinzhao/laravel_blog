
@extends('home.base')

@section('content')

  @include('home/nav')
<style type="text/css">
body{background-color: #f1f2f3;}
.blogitem{float: inherit;background: none;}
.blogitem article {border-bottom: 0;}
.ajax-more{position: relative;top: 30px;}
</style>
<div class="zahuopu">
  <div class="dt-woo-list oh">
    <div class="dt-woo-list-inner blogitem">
        <div class="dt-woo dt-woo-0"> <a target="_blank" class="dt-woo-img"> <img src="images/img3.jpg"> </a> <a class="dt-img-cover" href=""></a>
          <div class="dt-woo-desc">
            <p class="dt-woo-title"> <a href="" title="2016夏天新款裤子背带短裤直筒卷边宽松学生休闲背带裤吊带裤女裤">2016夏天新款裤子背带短裤直筒卷边宽松学生休闲背带裤吊带裤女裤</a> </p>
            <p class="dt-woo-attr"> 22人在逛 </p>
            <a href="" class="dt-woo-cat"> 逛逛 </a> </div>
        </div>
        <div class="dt-woo dt-woo-0"> <a target="_blank" class="dt-woo-img"> <img src="images/img7.jpg"> </a> <a class="dt-img-cover" href=""></a>
          <div class="dt-woo-desc">
            <p class="dt-woo-title"> <a href="" title="木木家.清新条纹裙裤女 夏装蝴蝶结高腰短裙A字裙半身裙">木木家.清新条纹裙裤女 夏装蝴蝶结高腰短裙A字裙半身裙</a> </p>
            <p class="dt-woo-attr"> 14人在逛 </p>
            <a href="" class="dt-woo-cat"> 逛逛 </a> </div>
        </div>
        <div class="dt-woo dt-woo-0"> <a target="_blank" class="dt-woo-img"> <img src="images/img8.jpg"> </a> <a class="dt-img-cover" href=""></a>
          <div class="dt-woo-desc">
            <p class="dt-woo-title"> <a href="" title="文艺夏季新款小清新短袖">文艺夏季新款小清新短袖</a> </p>
            <p class="dt-woo-attr"> 239人在逛 </p>
            <a href="" class="dt-woo-cat"> 逛逛 </a> </div>
        </div>
        <div class="dt-woo dt-woo-0"> <a target="_blank" class="dt-woo-img"> <img src="images/img10.jpg"> </a> <a class="dt-img-cover" href=""></a>
          <div class="dt-woo-desc">
            <p class="dt-woo-title"> <a href="" title="宽松七分袖上衣气质百搭衬衫">宽松七分袖上衣气质百搭衬衫</a> </p>
            <p class="dt-woo-attr"> 130人在逛 </p>
            <a href="" class="dt-woo-cat"> 逛逛 </a> </div>
        </div>
        <div class="dt-woo dt-woo-0"> <a target="_blank" class="dt-woo-img"> <img src="images/img12.jpg"></a> <a class="dt-img-cover" href=""></a>
          <div class="dt-woo-desc">
            <p class="dt-woo-title"> <a href="" title="长袖韩范学院风小清新棉麻复古衬衣">长袖韩范学院风小清新棉麻复古衬衣</a> </p>
            <p class="dt-woo-attr"> 136人在逛 </p>
            <a href="" class="dt-woo-cat">逛逛</a> </div>
        </div>
        <div class="dt-woo dt-woo-0"> <a target="_blank" class="dt-woo-img"> <img src="images/img14.jpg"> </a> <a class="dt-img-cover" href=""></a>
          <div class="dt-woo-desc">
            <p class="dt-woo-title"> <a href="" title="白色纯棉提花短袖衬衫女">白色纯棉提花短袖衬衫女</a> </p>
            <p class="dt-woo-attr"> 74人在逛 </p>
            <a href="" class="dt-woo-cat"> 逛逛 </a> </div>
        </div>
        <div class="dt-woo dt-woo-0"> <a target="_blank" class="dt-woo-img"> <img src="images/img18.jpg"> </a> <a class="dt-img-cover" href=""></a>
          <div class="dt-woo-desc">
            <p class="dt-woo-title"> <a href="" title="泡泡袖纯棉短袖衬衫女夏">泡泡袖纯棉短袖衬衫女夏</a> </p>
            <p class="dt-woo-attr"> 34人在逛 </p>
            <a href="" class="dt-woo-cat"> 逛逛 </a> </div>
        </div>
        <div class="dt-woo dt-woo-0"> <a target="_blank" class="dt-woo-img"> <img src="images/img2.jpg"> </a> <a class="dt-img-cover" href=""></a>
          <div class="dt-woo-desc">
            <p class="dt-woo-title"> <a href="" title="学院风蕾丝拼接休闲纯棉条纹T恤春夏">学院风蕾丝拼接休闲纯棉条纹T恤春夏</a> </p>
            <p class="dt-woo-attr"> 36人在逛 </p>
            <a href="" class="dt-woo-cat"> 逛逛 </a> </div>
        </div>
    </div>
  </div>
</div>
<div class="post-nav-right"><p><a href="http://www.lmlblog.com/wo/" target="_blank">加载更多</a></p></div>
<!-- 侧栏分类 -->
<div class="hsh-items">
  <ul>
    <li class="hsh-item hsh-item1"><a href=""><i class="item-icon item1-icon"></i><span>上衣</span><i class="icon-r"></i></a></li>
    <li class="hsh-item hsh-item2"><a href=""><i class="item-icon item2-icon"></i><span>裙裤</span><i class="icon-r"></i></a></li>
    <li class="hsh-item hsh-item3"><a href=""><i class="item-icon item3-icon"></i><span>配饰</span><i class="icon-r"></i></a></li>
    <li class="hsh-item hsh-item4"><a href=""><i class="item-icon item4-icon"></i><span>鞋子</span><i class="icon-r"></i></a></li>
    <li class="hsh-item hsh-item5"><a href=""><i class="item-icon item5-icon"></i><span>包袋</span><i class="icon-r"></i></a></li>
    <li class="hsh-item hsh-item6"><a href=""><i class="item-icon item6-icon"></i><span>日杂</span><i class="icon-r"></i></a></li>
  </ul>
</div>

@endsection