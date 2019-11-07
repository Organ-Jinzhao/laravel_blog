<?php echo e(csrf_field()); ?>

<div class="layui-form-item">
    <label for="" class="layui-form-label">分类</label>
    <div class="layui-input-inline">
        <select name="category_id" lay-verify="required">
            <option value=""></option>
            <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php if(isset($article->category_id)&&$article->category_id==$category->id): ?>selected <?php endif; ?> ><?php echo e($category->name); ?></option>
                <?php if(isset($category->allChilds)&&!$category->allChilds->isEmpty()): ?>
                    <?php $__currentLoopData = $category->allChilds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($child->id); ?>" <?php if(isset($article->category_id)&&$article->category_id==$child->id): ?>selected <?php endif; ?> >&nbsp;&nbsp;&nbsp;┗━━<?php echo e($child->name); ?></option>
                        <?php if(isset($child->allChilds)&&!$child->allChilds->isEmpty()): ?>
                            <?php $__currentLoopData = $child->allChilds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $third): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($third->id); ?>" <?php if(isset($article->category_id)&&$article->category_id==$third->id): ?>selected <?php endif; ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;┗━━<?php echo e($third->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">标签</label>
    <div class="layui-input-block">
        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="checkbox" name="tags[]" <?php echo e($tag->checked??''); ?> value="<?php echo e($tag->id); ?>" title="<?php echo e($tag->name); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label" >标题</label>
    <div class="layui-input-block" style="width:500px;">
        <input type="text" name="title" value="<?php echo e($article->title??old('title')); ?>" lay-verify="required" placeholder="请输入标题" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">关键词</label>
    <div class="layui-input-block">
        <input type="text" name="keywords" value="<?php echo e($article->keywords??old('keywords')); ?>" lay-verify="required" placeholder="请输入关键词" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">描述</label>
    <div class="layui-input-block">
        <textarea name="description" placeholder="请输入描述" class="layui-textarea"><?php echo e($article->description??old('description')); ?></textarea>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">点击量</label>
    <div class="layui-input-block" style="width:200px;">
        <input type="number" name="click" value="<?php echo e($article->click??mt_rand(100,500)); ?>" lay-verify="required|numeric"  class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">like</label>
    <div class="layui-input-block" style="width:200px;">
        <input type="number" name="like" value="<?php echo e($article->like??old('like')); ?>"  class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">缩略图</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear">
                    <?php if(isset($article->thumb)): ?>
                        <li><img src="<?php echo e($article->thumb); ?>" /><p>上传成功</p></li>
                    <?php endif; ?>
                </ul>
                <input type="hidden" name="thumb" id="thumb" value="<?php echo e($article->thumb??''); ?>">
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('UEditor::head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="layui-form-item">
    <label for="" class="layui-form-label">内容</label>
    <div class="layui-input-block">
        <script id="container" name="content" type="text/plain">
            <?php echo $article->content??old('content'); ?>

        </script>
    </div>
</div>


<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="<?php echo e(route('admin.article')); ?>" >返 回</a>
    </div>
</div>