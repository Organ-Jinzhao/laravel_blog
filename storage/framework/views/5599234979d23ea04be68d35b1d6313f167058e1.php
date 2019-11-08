<?php $__env->startSection('content'); ?>
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <div class="layui-btn-group ">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('home.statement.destroy')): ?>
                    <button class="layui-btn layui-btn-sm layui-btn-danger" id="listDelete">删 除</button>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('home.statement.create')): ?>
                    <a class="layui-btn layui-btn-sm" href="<?php echo e(route('admin.statement.create')); ?>">添 加</a>
                <?php endif; ?>
                <button class="layui-btn layui-btn-sm" id="searchBtn">搜 索</button>
            </div>

            <div class="layui-form" >
                <div class="layui-input-inline">
                    <select name="author"  id="author" lay-search lay-verify="required">
                        <option value=""  >所有人</option>
                        <?php $__currentLoopData = $author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($member['author']); ?>"  ><?php echo e($member['member']['name']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="layui-input-inline">
                    标题:
                    <div class="layui-inline" style="width: 188px;">
                        <input type="text" name="title"  id="title"  class="layui-input"  placeholder="输入标题关键字">
                    </div>
                </div>
                <div class="layui-input-inline">
                    日期时间:
                    <div class="layui-inline" style="width: 188px;">
                        <input type="text" name="created_at"  class="layui-input" id="dateyear" placeholder="yyyy-MM-dd">
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-card-body">
            <table id="dataTable" lay-filter="dataTable"></table>
            <script type="text/html" id="options">
                <div class="layui-btn-group">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('home.statement.edit')): ?>
                        <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('home.statement.destroy')): ?>
                        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                    <?php endif; ?>
                </div>
            </script>

            <script type="text/html" id="image">
            {{#  if(d.image){ }}
            <a href="javascript:void(0);" lay-event="img_big" title="{{d.image}}"><img src="{{d.image}}" alt="" width="50" height="28"></a>
            {{# }else{ }}
            <a href="javascript:void(0);" lay-event="img_big" title="<?php echo e(asset('/images/noimage.jpeg')); ?>"><img src="<?php echo e(asset('/images/noimage.jpeg')); ?>" alt="" width="50" height="28"></a>
            {{# }; }}
                <img alt="" style="display:none;" id="displayImg" src="" height="500" width="500"/>
            </script>

            <script type="text/html" id="member">
                {{ d.member.name }}
            </script>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('home.statement')): ?>
        <style type="text/css">
            /*调整图片透明度*/
            .myskin{
                background-color:transparent;/*透明（可根据需求自己调整）*/
                opacity: 0.9;/*透明度*/}
            .demo-class{border-top:1px solid #E9E7E7}
        </style>
        <script>
            layui.use(['layer','table','form'],function () {
                var layer = layui.layer;
                var form = layui.form;
                var table = layui.table;
                //用户表格初始化
                var dataTable = table.render({
                    elem: '#dataTable'
                    ,height: 500
                    ,url: "<?php echo e(route('admin.statement.data')); ?>" //数据接口
                    ,page: true //开启分页
                    ,cols: [[ //表头
                        {checkbox: true,fixed: true}
                        ,{field: 'id', title: 'ID', sort: true,width:80}
                        ,{field: 'member', title: '作者', sort: true,toolbar:'#member',width:120}
                        ,{field: 'image', title: '封面图片',toolbar:'#image',width:90}
                        ,{field: 'content', title: '内容预览'}
                        ,{field: 'click', title: '浏览量',sort: true,}
                        ,{field: 'created_at', title: '创建时间'}
                        ,{fixed: 'right', width: 220, align:'center', toolbar: '#options'}
                    ]]
                });

                //监听工具条
                table.on('tool(dataTable)', function(obj){ //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
                    var data = obj.data //获得当前行数据
                        ,layEvent = obj.event; //获得 lay-event 对应的值
                    if(layEvent === 'del'){
                        layer.confirm('确认删除当前项吗？', function(index){
                            $.post("<?php echo e(route('admin.statement.destroy')); ?>",{_method:'delete',ids:[data.id]},function (result) {
                                if (result.code==0){
                                    obj.del(); //删除对应行（tr）的DOM结构
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        });
                    } else if(layEvent === 'edit'){
                        location.href = '/admin/statement/'+data.id+'/edit';
                    }

                    //图片放大效果
                    if (layEvent === 'img_big') {
                        var url = $(this).attr('title');
                        $("#displayImg").attr("src", url);
                        var height = $("#displayImg").height();
                        var width = $("#displayImg").width();
                        layer.open({
                            type: 1,
                            title: false,
                            closeBtn: 0,//隐藏关闭按钮
                            shade: [0.3, '#000'],//黑色背景（0.3代表颜色深度）
                            shadeClose: true,//点击遮罩关闭大图
                            area: ['500px', '500px'], //宽高
                            resize:false,//不可拖拽缩放
                            skin: 'myskin',//大图背景色定义类
                            content: "<img height='500px;'width='500px;'alt=" + name + " title=" + name + " src=" + url + ">"
                        });
                    }
                });

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('home.statement.edit')): ?>
                //监听是否显示
                form.on('switch(isShow)', function(obj){
                    var index = layer.load();
                    var url = $(obj.elem).attr('url')
                    var data = {
                        "is_show" : obj.elem.checked==true?1:0,
                        "_method" : "put"
                    }
                    $.post(url,data,function (res) {
                        layer.close(index)
                        layer.msg(res.msg)
                    },'json');
                });
                <?php endif; ?>

                //按钮批量删除
                $("#listDelete").click(function () {
                    var ids = []
                    var hasCheck = table.checkStatus('dataTable')
                    var hasCheckData = hasCheck.data
                    if (hasCheckData.length>0){
                        $.each(hasCheckData,function (index,element) {
                            ids.push(element.id)
                        })
                    }
                    if (ids.length>0){
                        layer.confirm('确认删除勾选项吗？', function(index){
                            $.post("<?php echo e(route('admin.statement.destroy')); ?>",{_method:'delete',ids:ids},function (result) {
                                if (result.code==0){
                                    dataTable.reload()
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        })
                    }else {
                        layer.msg('请选择删除项')
                    }
                });
                //日期选择
                layui.use('laydate', function(){
                    var laydate = layui.laydate;
                    //常规用法
                    laydate.render({
                        elem: '#dateyear'
                        ,trigger: 'click' //自动弹出控件的事件，采用click弹出
                        ,theme: '#FF8C00'
                    });
                });
                //搜索
                $("#searchBtn").click(function () {
                    var author = $("#author").val();
                    var title = $("#title").val();
                    var created_at = $("#dateyear").val();
                    dataTable.reload({
                        where:{author:author,title:title,created_at:created_at},
                        page:{curr:1}
                    })
                })
            })
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>