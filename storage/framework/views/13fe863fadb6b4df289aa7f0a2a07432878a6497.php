<?php $__env->startSection('content'); ?>
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <div class="layui-btn-group ">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('member.member.destroy')): ?>
                    <button class="layui-btn layui-btn-sm layui-btn-danger" id="listDelete">删除</button>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('member.member.create')): ?>
                    <a class="layui-btn layui-btn-sm" href="<?php echo e(route('admin.member.create')); ?>">添加</a>
                <?php endif; ?>
                <button class="layui-btn layui-btn-sm" id="memberSearch">搜索</button>
            </div>
            <div class="layui-form">
                <div class="layui-input-inline">
                    <input type="text" name="name" id="name" placeholder="请输入昵称" class="layui-input">
                </div>
                <div class="layui-input-inline">
                    <input type="text" name="phone" id="phone" placeholder="请输入手机号" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-card-body">
            <table id="dataTable" lay-filter="dataTable"></table>
            <script type="text/html" id="options">
                <div class="layui-btn-group">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('member.member.create')): ?>
                        <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('member.member.destroy')): ?>
                        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                    <?php endif; ?>
                </div>
            </script>
            <script type="text/html" id="avatar">
                <a href="javascript:void(0);" lay-event="img_big"  title="{{d.avatar}}"><img src="{{d.avatar}}" alt="" width="28" height="28"></a>
                <img alt="" style="display:none;" id="displayImg" src="" height="500" width="500"/>
            </script>
            <script type="text/html" id="info">
                {{#  if(d.user_id ){ }}
                <button class="layui-btn layui-btn-danger"  lay-event="show">已填写</button>
                {{#  } else { }}
                <button class="layui-btn layui-btn-warm" lay-event="show">未填写</button>
                {{#  } }}
            </script>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('member.member')): ?>
        <style type="text/css">
            /*调整图片透明度*/
            .myskin{
                background-color:transparent;/*透明（可根据需求自己调整）*/
            opacity: 0.9;/*透明度*/}
            .demo-class{border-top:1px solid #E9E7E7}
        </style>
        <script>
            layui.use(['element', 'layer', 'table', 'form'], function () {
                var layer = layui.layer;
                var form = layui.form;
                var table = layui.table;
                var element = layui.element;

                //用户表格初始化
                var dataTable = table.render({
                    elem: '#dataTable'
                    , height: 500
                    , url: "<?php echo e(route('admin.member.data')); ?>" //数据接口
                    , where: {model: "member"}
                    , page: true //开启分页
                    , cols: [[ //表头
                        {checkbox: true, fixed: true}
                        , {field: 'id', title: 'ID', sort: true, width: 80}
                        , {field: 'name', title: '昵称'}
                        , {field: 'avatar', title: '头像', toolbar: '#avatar', width: 100}
                        , {field: 'user_id', title: '个人信息', toolbar: '#info'}
                        , {field: 'created_at', title: '创建时间'}
                        , {field: 'updated_at', title: '更新时间'}
                        , {fixed: 'right', width: 120, align: 'center', toolbar: '#options'}
                    ]]
                });

                //监听工具条
                table.on('tool(dataTable)', function (obj) { //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
                    var data = obj.data //获得当前行数据
                        , layEvent = obj.event; //获得 lay-event 对应的值
                    if (layEvent === 'del') {
                        layer.confirm('确认删除吗？', function (index) {
                            $.post("<?php echo e(route('admin.member.destroy')); ?>", {
                                _method: 'delete',
                                ids: [data.id]
                            }, function (result) {
                                if (result.code == 0) {
                                    obj.del(); //删除对应行（tr）的DOM结构
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        });
                    } else if (layEvent === 'edit') {
                        location.href = '/admin/member/' + data.id + '/edit';
                    }
                    //详细信息
                    if (layEvent === 'show') {
                        layer.open({
                            type: 2 //此处以iframe举例
                            , title: '详细资料'
                            , area: ['800px', '500px']
                            , shade: 0
                            , skin: 'demo-class'
                            , maxmin: true
                            , content: '/admin/member/'+data.id+'/info'
                            , zIndex: layer.zIndex //重点1
                            , success: function (layero) {
                                layer.setTop(layero); //重点2
                            }
                        });
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

                //按钮批量删除
                $("#listDelete").click(function () {
                    var ids = []
                    var hasCheck = table.checkStatus('dataTable')
                    var hasCheckData = hasCheck.data
                    if (hasCheckData.length > 0) {
                        $.each(hasCheckData, function (index, element) {
                            ids.push(element.id)
                        })
                    }
                    if (ids.length > 0) {
                        layer.confirm('确认删除吗？', function (index) {
                            $.post("<?php echo e(route('admin.member.destroy')); ?>", {
                                _method: 'delete',
                                ids: ids
                            }, function (result) {
                                if (result.code == 0) {
                                    dataTable.reload()
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        })
                    } else {
                        layer.msg('请选择删除项')
                    }
                });
                //搜索
                $("#memberSearch").click(function () {
                    var userSign = $("#user_sign").val()
                    var name = $("#name").val();
                    var phone = $("#phone").val();
                    dataTable.reload({
                        where: {user_sign: userSign, name: name, phone: phone},
                        page: {curr: 1}
                    })
                });

            })
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>