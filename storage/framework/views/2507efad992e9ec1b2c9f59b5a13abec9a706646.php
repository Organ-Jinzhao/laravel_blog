<?php echo e(csrf_field()); ?>

<div class="layui-form-item">
    <label for="" class="layui-form-label">上级分类</label>
    <div class="layui-input-inline">
        <select name="parent_id" lay-search  lay-filter="parent_id">
            <option value="0">一级分类</option>
            <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $first): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($first['id']); ?>" <?php if(isset($nav->parent_id)&&$nav->parent_id==$first['id']): ?> selected <?php endif; ?>><?php echo e($first['name']); ?></option>
                <?php if(isset($first['_child'])): ?>
                    <?php $__currentLoopData = $first['_child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $second): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($second['id']); ?>" <?php echo e(isset($nav->id) && $nav->parent_id==$second['id'] ? 'selected' : ''); ?> >&nbsp;&nbsp;┗━━<?php echo e($second['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">名称</label>
    <div class="layui-input-block" style="width:200px;">
        <input type="text" name="name" value="<?php echo e($nav->name ?? old('name')); ?>" lay-verify="required" placeholder="请输入名称" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">URL</label>
    <div class="layui-input-block" style="width:200px;">
        <input type="text" name="url" value="<?php echo e($nav->url ?? old('url')); ?>" lay-verify="required" placeholder="请输入路由地址" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">缩略图</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear">
                    <?php if(isset($nav->image)): ?>
                        <li><img src="<?php echo e($nav->image); ?>" /><p>上传成功</p></li>
                    <?php endif; ?>
                </ul>
                <input type="hidden" name="image" id="thumb" value="<?php echo e($nav->image??''); ?>">
            </div>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">右侧语言</label>
    <div class="layui-input-block" style="width:500px;">
        <textarea name="right_text" placeholder="请输入描述" class="layui-textarea"><?php echo e($article->right_text??old('right_text')); ?></textarea>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">左侧语言</label>
    <div class="layui-input-block" style="width:500px;">
        <textarea name="left_text" placeholder="请输入描述" class="layui-textarea"><?php echo e($article->left_text??old('left_text')); ?></textarea>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">排序</label>
    <div class="layui-input-block" style="width:200px;">
        <input type="text" name="sort" value="<?php echo e($nav->sort ?? 0); ?>" lay-verify="required|number" placeholder="请输入数字" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="<?php echo e(route('admin.nav')); ?>" >返 回</a>
    </div>
</div>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('admin.nav._js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>