<?php $__env->startSection('content'); ?>
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新分类</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="<?php echo e(route('admin.nav.update',['id'=>$nav->id])); ?>" method="post">
                <?php echo e(method_field('put')); ?>

                <?php echo $__env->make('admin.nav._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>