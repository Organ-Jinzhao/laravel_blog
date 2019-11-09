<?php $__env->startSection('content'); ?>

        <?php echo $__env->make('home/nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="mainContent">
        <div style="position: absolute;right: 40px;"> <img src="<?php echo e(asset('/home/images/music.png')); ?>" border="0">
            <p style="text-align: center;">
                <embed wmode="transparent" width="25" height="20" src="/home/http://www.lmlblog.com/time/images/singlemp3player.swf?file=http://www.lmlblog.com/time/images/mengxianglvxing.mp3&repeatPlay=true&songVolume=30"
                       type="application/x-shockwave-flash')" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </p>
        </div>
        <style type="text/css">
            div#float{
                -webkit-animation: error-swing infinite 2s ease-in-out alternate;
                -moz-animation: error-swing infinite 2s ease-in-out alternate;
                animation: error-swing infinite 2s ease-in-out alternate;
                -webkit-transform-origin: center top;
                -moz-transform-origin: center top;
                transform-origin: center top;
            }
            @-webkit-keyframes error-swing{
                0%{-webkit-transform:rotate(1deg)}
                100%{-webkit-transform:rotate(-2deg)}
            }
            @-moz-keyframes error-swing{
                0%{-moz-transform:rotate(1deg)}
                100%{-moz-transform:rotate(-2deg)}
            }
            @keyframes  error-swing{
                0%{transform:rotate(1deg)}
                100%{transform:rotate(-2deg)}
            }
        </style>
        <aside>
            <div class="sidebar-avatar">
                <div class="avatar"> <a href="/about"> <img src="<?php echo e($user->avatar); ?>"> </a> </div>
                <div class="userinfo">
                    <p class="btns"> <a href="/liuyan">留言</a> <a href="/album">图集</a> <a target="_blank" href="/shop">我的小铺</a> </p>
                </div>
                <div class="sidebar-avatar-footer"></div>
            </div>
            <section class="taglist">
                <h2>全部标签</h2>
                <ul>
                    <a href='#' class='tag-link-20 tag-link-position-1' title='1个话题' style='font-size: 8pt;'>人像</a> <a href='#' class='tag-link-7 tag-link-position-2' title='1个话题' style='font-size: 8pt;'>假如</a> <a href='#' class='tag-link-27 tag-link-position-3' title='6个话题' style='font-size: 22pt;'>可爱</a> <a href='#' class='tag-link-33 tag-link-position-4' title='1个话题' style='font-size: 8pt;'>吊带衫</a> <a href='#' class='tag-link-28 tag-link-position-5' title='2个话题' style='font-size: 12.581818181818pt;'>唯美</a> <a href='#' class='tag-link-14 tag-link-position-6' title='2个话题' style='font-size: 12.581818181818pt;'>夏天</a> <a href='#' class='tag-link-9 tag-link-position-7' title='5个话题' style='font-size: 20.218181818182pt;'>男神</a> <a href='#' class='tag-link-18 tag-link-position-8' title='4个话题' style='font-size: 18.181818181818pt;'>小清新</a> <a href='#' class='tag-link-15 tag-link-position-9' title='1个话题' style='font-size: 8pt;'>少男</a> <a href='#' class='tag-link-25 tag-link-position-10' title='3个话题' style='font-size: 15.636363636364pt;'>帽子</a> <a href='#' class='tag-link-34 tag-link-position-11' title='1个话题' style='font-size: 8pt;'>扎辫</a> <a href='#' class='tag-link-16 tag-link-position-12' title='1个话题' style='font-size: 8pt;'>摄影</a> <a href='#' class='tag-link-6 tag-link-position-13' title='1个话题' style='font-size: 8pt;'>散场</a> <a href='#' class='tag-link-12 tag-link-position-14' title='2个话题' style='font-size: 12.581818181818pt;'>文艺</a> <a href='#' class='tag-link-21 tag-link-position-15' title='1个话题' style='font-size: 8pt;'>文艺范</a> <a href='#' class='tag-link-17 tag-link-position-16' title='1个话题' style='font-size: 8pt;'>日系</a> <a href='http://www.lmlblog.com/winter/xqsb/' class='tag-link-19 tag-link-position-17' title='1个话题' style='font-size: 8pt;'>爱生活</a> <a href='#' class='tag-link-5 tag-link-position-18' title='1个话题' style='font-size: 8pt;'>流年</a> <a href='#' class='tag-link-11 tag-link-position-19' title='6个话题' style='font-size: 22pt;'>清新</a> <a href='#' class='tag-link-31 tag-link-position-20' title='1个话题' style='font-size: 8pt;'>游泳</a> <a href='#' class='tag-link-32 tag-link-position-21' title='1个话题' style='font-size: 8pt;'>猫</a> <a href='#' class='tag-link-10 tag-link-position-22' title='1个话题' style='font-size: 8pt;'>白色</a> <a href='#' class='tag-link-22 tag-link-position-23' title='1个话题' style='font-size: 8pt;'>眼睛</a> <a href='#' class='tag-link-24 tag-link-position-24' title='4个话题' style='font-size: 18.181818181818pt;'>短发</a> <a href='#' class='tag-link-23 tag-link-position-25' title='1个话题' style='font-size: 8pt;'>穿搭</a> <a href='#' class='tag-link-29 tag-link-position-26' title='1个话题' style='font-size: 8pt;'>篮球</a> <a href='#' class='tag-link-35 tag-link-position-27' title='1个话题' style='font-size: 8pt;'>红色</a> <a href='#' class='tag-link-13 tag-link-position-28' title='1个话题' style='font-size: 8pt;'>萌</a> <a href='#' class='tag-link-26 tag-link-position-29' title='1个话题' style='font-size: 8pt;'>运动</a> <a href='#' class='tag-link-30 tag-link-position-30' title='1个话题' style='font-size: 8pt;'>长发</a> <a href='#' class='tag-link-4 tag-link-position-31' title='2个话题' style='font-size: 12.581818181818pt;'>青春</a>
                </ul>
            </section>
            <div id="float_a" class="div_a">
                <div id="div-pin"></div>
                <div id="float" class="div1"> <a href="/" ><img src="<?php echo e($user->avatar); ?>"></a> </div>
            </div>
        </aside>
        <!-- 侧栏跟随 -->
        <script type="text/javascript">
            (function(){

                var oDiv=document.getElementById("float_a");
                var H=0,iE6;
                var Y=oDiv;
                while(Y){H+=Y.offsetTop;Y=Y.offsetParent};
                iE6=window.ActiveXObject&&!window.XMLHttpRequest;
                if(!iE6){
                    window.onscroll=function()
                    {
                        var s=document.body.scrollTop||document.documentElement.scrollTop;
                        if(s>H){oDiv.className="div_a div2";if(iE6){oDiv.style.top=(s-H)+"px";}}
                        else{oDiv.className="div_a";}
                    };
                }

            })();
        </script>

        <?php echo $__env->yieldContent('left'); ?>

            </div>
        <div class="blank"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>