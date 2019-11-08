

@foreach($nav as $val)
    @if($val['url'] == $_SERVER['REQUEST_URI'])
<body style="cursor: url({{asset('/home/images/cursor.gif')}}),auto;">
<header id="container2" style="background: #226039 url({{$val['image']}}) center 0 scroll no-repeat; background-size: 100% 330px;" >
    <div class="popover left" data-easein="cardInLeft" data-easeout="cardOutLeft" id="pop7">
        <div class="arrow"></div>
        <div class="popover-inner">
            <div class="popover-content">
                <p>{{$val['left_text']}}</p>
            </div>
        </div>
    </div>
    <div class="popover right" data-easein="cardInRight" data-easeout="cardOutRight" id="pop6">
        <div class="arrow"></div>
        <div class="popover-inner">
            <div class="popover-content">
                <p>{{$val['right_text']}}</p>
            </div>
        </div>
    </div>
    @endif
    @endforeach




<img src="{{asset('/home/images/arrow1.png')}}" alt="info" class="info-icon info-icon1" data-target="pop7"/> <img src="{{asset('/home/images/arrow1.png')}}" alt="info" class="info-icon info-icon2" data-target="pop6"/>
<div class="quotes">
    <div class="text5">时光·记录</div>
    <p>生命中有一些人与我们擦肩了，却来不及遇见;遇见了，却来不及相识;相识了，却来不及熟悉，却还要是再见。——对自己好点，因为一辈子不长;对身边的人好点，因为下辈子不一定能遇见......</p>
    <div class="flower"> <a href="/" class="make">咔嚓</a>
        <div class="mess">
            <ul class="reset">
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img1.jpg')}}"><img src="{{asset('/home/images/img1.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img2.jpg')}}"><img src="{{asset('/home/images/img2.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img3.jpg')}}"><img src="{{asset('/home/images/img3.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img4.jpg')}}"><img src="{{asset('/home/images/img4.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img5.jpg')}}"><img src="{{asset('/home/images/img5.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img6.jpg')}}"><img src="{{asset('/home/images/img6.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img7.jpg')}}"><img src="{{asset('/home/images/img7.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img8.jpg')}}"><img src="{{asset('/home/images/img8.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img9.jpg')}}"><img src="{{asset('/home/images/img9.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img10.jpg')}}"><img src="{{asset('/home/images/img10.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img11.jpg')}}"><img src="{{asset('/home/images/img11.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img12.jpg')}}"><img src="{{asset('/home/images/img12.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img13.jpg')}}"><img src="{{asset('/home/images/img13.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img14.jpg')}}"><img src="{{asset('/home/images/img14.jpg')}}"></a></li>
                <li><a class="fancybox" data-fancybox-group="gallery" href="{{asset('/home/images/img15.jpg')}}"><img src="{{asset('/home/images/img15.jpg')}}"></a></li>
            </ul>
        </div>
    </div>
</div>
<div id="nav" class="menu-container">
    <ul id="menu-0" class="menu">
        @foreach($nav as $val)
            <li id="menu-item-1" class="menu-item-1"><a href="{{$val['url']}}">{{$val['name']}}</a></li>
        @endforeach
         <li style="float:right;"><a href="/" style="color:#00FFFF;">注册</a></li>
            <li style="float:right;"><a href="/" style="color:#00FFFF;">登录</a></li>

    </ul>
</div>