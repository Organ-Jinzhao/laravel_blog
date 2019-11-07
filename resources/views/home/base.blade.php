<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>小清新个人博客主页模板 - 用照片记录时光</title>
    <meta name="Keywords" content="MAOLAI个人博客,个人网站,个人博客模板,个人网站模板" >
    <meta name="Description" content="MAOLAI个人博客,个人网站,个人博客模板,个人网站模板" >
    <link rel="shortcut icon" href="{{asset('/home/images/lmlblog.png')}}" />
    <script type="text/javascript" src="{{asset('/home/js/jquery.min.js')}}" ></script>
    <link href="{{asset('/home/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/css/jquery.fancybox.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('/home/css/tips.css')}}" />
    <script type="text/javascript">
        $(document).ready(function() {
            $('.fancybox').fancybox();
            $(".fancybox-effects-c").fancybox({
                wrapCSS    : 'fancybox-custom',
                closeClick : true,
                openEffect : 'none',
                helpers : {
                    title : {
                        type : 'inside'
                    },
                    overlay : {
                        css : {
                            'background' : 'rgba(238,238,238,0.85)'
                        }
                    }
                }
            });
            $("#single_1").fancybox({
                helpers: {
                    title : {
                        type : 'float'
                    }
                }
            });
        });
    </script>
    <style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function($){
            //$('#container1').hotSpot();
            var _pop2 = $('#container2').hotSpot({
                slideshow : false,
                triggerBy : 'click',
                autoHide : false
            });
            $('#image2').on('click',function(event){
                _pop2.hideCurrentPop();
            });


        });
    </script>
</head>
<body style="cursor: url({{asset('home/images/cursor.gif')}}),auto;">
  @yield('content')

<footer>
    <div class="footavatar"> <img src="{{$user->avatar}}" class="footphoto">
        <ul class="footinfo">
            <p class="fname"><a href="/about" >{{$user->name}}</a> </p>
            <p class="finfo">兴趣：上网，旅行，音乐，骑自行车</p>
            <p class="finfo">性格：外冷内热、小逗比、</p>
            <div style="float:right;font-size: 16px;">——离开，只为遇见更好的自己</div>
        </ul>
    </div>
    <section class="visitor">
        <div style="margin-bottom:10px; ">
            <h2 style="float: left;">左邻右舍</h2>
            <h2 style="float: right;"><a href="http://www.lmlblog.com/time/liuyan.html" target="_blank">更多</a></h2>
        </div>
        <ul>
            <li><a href="/" rel="nofollw" title="动漫资讯"><img src="{{asset('/home/images/s2.jpg')}}"></a></li>
            <li><a href="/" rel="nofollw" title="超神学院"><img src="{{asset('/home/images/s1.jpg')}}"></a></li>
            <li><a href="/" rel="nofollw" title="唯美说说乐园"><img src="{{asset('/home/images/s0.gif')}}"></a></li>
        </ul>
    </section>
    <div class="Copyright">
        <div class="n-a">
            <p>每一次访问就会自动排在第一位:)</p>
            <p>每一次错过，都是为了下一次的相遇。 每一次相遇，都是久别重逢。最美好的，莫过于，与你相遇在最美的时光里。</p>
        </div>
        <p style="clear: both;">© Copyright 2016 <a href=/home/http://www.lmlblog.com/" target="_blank">MAOLAI个人博客</a>  时光.记录 （www.lmlblog.com）</p>
    </div>
</footer>
</body>
<script type="text/javascript" src="{{asset('/home/js/tips.js')}}"></script>
<script type="text/javascript" src="{{asset('/home/js/base.js')}}"></script>
<script type="text/javascript" src="{{asset('/home/js/jquery.mousewheel-3.0.6.pack.js')}}"></script>
<script type="text/javascript" src="{{asset('/home/js/jquery.fancybox.js')}}"></script>
</html>