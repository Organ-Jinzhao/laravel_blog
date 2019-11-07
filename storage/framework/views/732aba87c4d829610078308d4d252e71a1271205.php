<?php echo e(csrf_field()); ?>


<div class="layui-form-item">
    <label for="" class="layui-form-label">作者</label>
    <div class="layui-input-inline">
        <select name="author" lay-verify="required">
            <?php $__currentLoopData = $author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($member['id']); ?>" <?php if(isset($statement->author)&&$statement->author==$member['id']): ?>selected <?php endif; ?> ><?php echo e($member['name']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">缩略图</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear">
                    <?php if(isset($article->image)): ?>
                        <li><img src="<?php echo e($article->image); ?>" /><p>上传成功</p></li>
                    <?php endif; ?>
                </ul>
                <input type="hidden" name="image" id="thumb" value="<?php echo e($article->image??''); ?>">
            </div>
        </div>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">写些什么吧</label>
    <div class="layui-input-block" >
        <textarea name="content" placeholder="写些什么吧" style="width:800px;height:200px;" class="layui-textarea"><?php echo e($statement->content??old('content')); ?></textarea>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">天气情况</label>
    <div class="layui-input-block" style="width:200px;">
        <input  type="text" name="weather" value="<?php echo e($statement->weather??old('weather')); ?>"  class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">点击量</label>
    <div class="layui-input-block" style="width:200px;">
        <input type="number" name="click" value="<?php echo e($statement->click??mt_rand(100,500)); ?>" lay-verify="required|numeric"  class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">like</label>
    <div class="layui-input-block" style="width:200px;">
        <input type="number" name="like" value="<?php echo e($statement->like??old('like')); ?>"  class="layui-input" >
    </div>
</div>


<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="<?php echo e(route('admin.statement')); ?>" >返 回</a>
    </div>
</div>