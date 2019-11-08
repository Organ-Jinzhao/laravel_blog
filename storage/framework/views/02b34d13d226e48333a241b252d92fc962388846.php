<?php $__env->startSection('content'); ?>
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <div class="layui-btn-group">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('config.position.create')): ?>
                    <a class="layui-btn layui-btn-sm" href="<?php echo e(route('admin.position.create')); ?>">添加</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="layui-card-body">
            <table id="dataTable" lay-filter="dataTable"></table>
            <script type="text/html" id="options">
                <div class="layui-btn-group">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('config.position.edit')): ?>
                        <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('config.position.destroy')): ?>
                        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                    <?php endif; ?>
                </div>
            </script>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('config.position')): ?>
        <script>
            layui.use(['layer','table','form'],function () {
                var layer = layui.layer;
                var form = layui.form;
                var table = layui.table;
                //用户表格初始化
                var dataTable = table.render({
                    elem: '#dataTable'
                    ,height: 500
                    ,url: "<?php echo e(route('admin.position.data')); ?>" //数据接口
                    ,page: true //开启分页
                    ,cols: [[ //表头
                        {checkbox: true,fixed: true}
                        ,{field: 'id', title: 'ID', sort: true,width:80}
                        ,{field: 'name', title: '分类名称'}
                        ,{field: 'sort', title: '排序'}
                        ,{field: 'created_at', title: '创建时间'}
                        ,{field: 'updated_at', title: '更新时间'}
                        ,{fixed: 'right', width: 220, align:'center', toolbar: '#options'}
                    ]]
                });

                //监听工具条
                table.on('tool(dataTable)', function(obj){ //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
                    var data = obj.data //获得当前行数据
                        ,layEvent = obj.event; //获得 lay-event 对应的值
                    if(layEvent === 'del'){
                        layer.confirm('确认删除吗？', function(index){
                            $.post("<?php echo e(route('admin.position.destroy')); ?>",{_method:'delete',ids:data.id},function (result) {
                                if (result.code==0){
                                    obj.del(); //删除对应行（tr）的DOM结构
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        });
                    } else if(layEvent === 'edit'){
                        location.href = '/admin/position/'+data.id+'/edit';
                    }
                });
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>