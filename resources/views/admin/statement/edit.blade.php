@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新文章</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.statement.update',['id'=>$statement->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.statement._form')
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.statement._js')
@endsection
