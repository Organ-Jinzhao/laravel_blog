

<?php $__env->startSection('left'); ?>

<div class="blogitem">
    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article>
            <h2 class="title"><a href="/article/<?php echo e($article['id']); ?>/content" title="个人空间"><?php echo e($article['title']); ?></a></h2>
            <ul class="text">
                <p><?php echo $article['content']; ?>&hellip;&#8230;</p>
            </ul>
            <div class="textfoot">
                <a href="javascript:void(0);" style="float: left;"><?php echo e($article['created_at']); ?></a>
                <a href="javascript:void(0);">#爱情、阳光</a>
                <a href="javascript:void(0);">#时光</a>
                <m class="post-like"> <a href="javascript:;" data-action="islike" data-id="<?php echo e($article['id']); ?>" class="favorite"> <span class="count"><?php echo e($article['like']); ?></span>  </a> </m></div>
        </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="more">
    </div>
    <div class="post-nav-inside">
        <div class="post-nav-left"></div>
        <div class="post-nav-right">
            <p><a href="javascript:void(0);" id="clickmore" data-id="0">点击阅读更多</a></p>
        </div>
    </div>
</div>

<script type="text/javascript">
    //点击更多选项
    $("#clickmore").click(function(){
        var id=$("#clickmore").attr('data-id');
        $("#clickmore").attr('data-id',++id);
        $.post("/article/more", { 'id': id,'_token':'<?php echo e(csrf_token()); ?>'},
            function(data) {
            //为空则判断数据到顶
            if(data =='null' || data == ''){
                $("#clickmore").text('我是有底线的💫');
                //移除点击事件
                $("#clickmore").unbind();
            }
            var content = '';
                $.each(data,function(key,val) {
                    content += '<article> <h2 class="title"><a href="/article/'+val['id']+'/content" title="个人空间">'+val['title']+'</a></h2> ' +
                        '<ul class="text"> <p>'+val['content']+'22&hellip;&#8230;</p> </ul> ' +
                        '<div class="textfoot"> ' +
                        '<a href="javascript:void(0);" style="float: left;">'+val['created_at']+'</a>' +
                        '<a href="javascript:void(0);">#爱情、阳光</a>' +
                        '<a href="javascript:void(0);">#时光</a> ' +
                        '<m class="post-like"> <a href="javascript:;" data-action="islike" data-id="'+val['id']+'" class="favorite"> ' +
                        '<span class="count">'+val['like']+'</span>  </a> </m></div>' +
                        '</article>';
                });
                $(".more").append(content);
            });
    });



    // like
    $.fn.postLike = function() {
        if ($(this).hasClass('done')) {
            $(this).removeClass('done');
            var id = $(this).data("id"),
                rateHolder = $(this).children('.count');
            $.post("/article/like", { 'action':'dec','id': id,'_token':'<?php echo e(csrf_token()); ?>'},
                function(data) {
                    $(rateHolder).html(data);
                });
        } else {
        $(this).addClass('done');
        var id = $(this).data("id"),
            rateHolder = $(this).children('.count');
        $.post("/article/like", { 'action':'add','id': id,'_token':'<?php echo e(csrf_token()); ?>'},
            function(data) {
                $(rateHolder).html(data);
            });
        return false;
         }
    };
    $(document).on("click", ".favorite",
        function() {
            $(this).postLike();
        });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.article.public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>