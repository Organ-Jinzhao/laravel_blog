@extends('admin.base')

@section('content')
<form class="layui-form" method="post" action="/admin/member/{{$id}}/info/create">
    {{csrf_field()}}
    <div class="layui-form-item">
        <label class="layui-form-label">地址:</label>
        <div class="layui-input-inline">
            <select name="province" lay-filter="provid"  lay-verify="required">
            @foreach(\App\Http\Controllers\PublicController::getProvince()  as $val)
                    @if(isset($userinfo->province))
                        <option value="{{$val->id}}" <?php if($userinfo->province == $val->name) echo "selected";?> >{{$val->name}}</option>
                    @else
                        <option value="{{$val->id}}">{{$val->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="layui-input-inline">
            <select name="city" id="city" lay-filter="cityid" lay-verify="required">
                @if(isset($userinfo->city))
                    @foreach($citys  as $val)
                        <option value="{{$val->id}}" <?php if($userinfo->city ==$val->name) echo "selected";?> >{{$val->name}}</option>
                    @endforeach
                @else
                <option value="">请选择所在城市</option>
                @endif
            </select>
        </div>
        <div class="layui-input-inline">
            <select name="area" id="area" lay-filter="areaid" lay-verify="required" >
                @if(isset($userinfo->area))
                    @foreach($areas  as $val)
                        <option value="{{$val->id}}" <?php if($userinfo->area ==$val->name) echo "selected";?> >{{$val->name}}</option>
                    @endforeach
                @else
                    <option value="">请选择所在区域</option>
                @endif
            </select>
        </div>
    </div>

    <div class="layui-form-item">
            <label class="layui-form-label">出生日期</label>
            <div class="layui-input-inline">
                <input name='date' value="{{$userinfo->date ?? old('date')}}" type="text" class="layui-input" id="dateyear" placeholder="yyyy-MM-dd" lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-input-block">
            @if(isset($userinfo->sex) && $userinfo->sex == 1)
                <input type="radio" name="sex" value="1" title="男" checked>
                <input type="radio" name="sex" value="2" title="女" >
            @elseif(isset($userinfo->sex) && $userinfo->sex == 2)
                <input type="radio" name="sex" value="1" title="男" >
                <input type="radio" name="sex" value="2" title="女" checked>
            @else
                <input type="radio" name="sex" value="1" title="男" checked>
                <input type="radio" name="sex" value="2" title="女" >
            @endif
        </div>
    </div>

    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">一段废话</label>
        <div class="layui-input-block">
            <textarea name="summary"  placeholder="请输入内容" class="layui-textarea">{{$userinfo->summary ?? old('summary')}}</textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
    @endsection

{{--先引入js和layui路径--}}
@section('script')

<script>

    //三级联动效果
    layui.use('form', function(){
        var form = layui.form;
        form.on('select(provid)', function(data){
            $("#city").empty();
            $("#area").empty();
            $.ajax({
                url:"/city/"+data.value,
                type:'get',
                success:function(req){
                    for(var i = 0; i < req.length; i++){
                        $("#city").append("<option value='"+req[i]['id']+"'>"+req[i]['name']+"</option>");//新增
                    }
                    $("#city option:eq(0)").attr('selected', 'selected');//选中第一个
                    //操作县区级option
                    var cityid = $("#city option:selected").val();
                    $.ajax({
                        url:"/area/"+cityid,
                        type:'get',
                        success:function(req){
                            console.log(req[0]['cityname']);
                            for(var i = 0; i < req.length; i++){
                                $("#area").append("<option value='"+req[i]['id']+"'>"+req[i]['name']+"</option>");//新增
                            }
                            $("#area option:eq(0)").attr('selected', 'selected');//选中第一个
                            form.render();
                        },
                    });
                    form.render();
                },
            });
        });
        form.on('select(cityid)', function(data){
            $("#area").empty();
            $.ajax({
                url:"/area/"+data.value,
                type:'get',
                success:function(req){
                    console.log(req[0]['cityname']);
                    for(var i = 0; i < req.length; i++){
                        $("#area").append("<option value='"+req[i]['id']+"'>"+req[i]['name']+"</option>");//新增
                    }
                    $("#area option:eq(0)").attr('selected', 'selected');//选中第一个
                    form.render();
                },
            });
        });
    });

    //生日框效果
    layui.use('laydate', function(){
        var laydate = layui.laydate;
        //常规用法
        laydate.render({
            elem: '#dateyear'
            ,trigger: 'click' //自动弹出控件的事件，采用click弹出
            ,theme: '#FF8C00'
        });

    });
</script>
@endsection



