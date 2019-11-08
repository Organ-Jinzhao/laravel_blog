<?php $__env->startSection('content'); ?>
    <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
        <form action="<?php echo e(route('admin.login')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                <input type="text" name="username" value="<?php echo e(old('username')); ?>" lay-verify="required" placeholder="用户名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                <input type="password" name="password"  lay-verify="required" placeholder="密码" class="layui-input">
            </div>
            
            <div class="layui-form-item" style="margin-bottom: 20px;">
                <input type="checkbox" name="remember" lay-skin="primary" title="记住密码">
                <a href="forget.html" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
            </div>
            <div class="layui-form-item">
                <button type="submit" class="layui-btn layui-btn-fluid" lay-submit lay-filter="">登 入</button>
            </div>
        </form>
        <div class="layui-trans layui-form-item layadmin-user-login-other">
            <label>社交账号登入</label>
            <a href="javascript:;"><i class="layui-icon layui-icon-login-qq"></i></a>
            <a href="javascript:;"><i class="layui-icon layui-icon-login-wechat"></i></a>
            <a href="javascript:;"><i class="layui-icon layui-icon-login-weibo"></i></a>

            <a href="reg.html" class="layadmin-user-jump-change layadmin-link">注册帐号</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.login_register.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>