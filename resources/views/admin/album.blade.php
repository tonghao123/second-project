@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{asset('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{asset('admin/album')}}">相册管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{asset('admin/album/add')}}"><span class="glyphicon glyphicon-plus"></span>新增相册</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    @if(count($errors) > 0)
        <div class="alert alert-danger" style="width:100%;text-align:center;margin:0 auto;!important;">
            <ul style="list-style: none;">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
     @endif

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>用户ID</th>
            <th>相册名</th>
            <th>状态</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        @foreach($album as $a)
            <tr>
                <td>{{$a['id']}}</td>
                <td>{{$a['uid']}}</td>
                <td>{{$a['pname']}}</td>
                <td>{{$a['status']}}</td>
                <td>{{$a['time']}}</td>
                <td>
                    <a href="{{asset('/admin/album/del/'.$a['id'])}}" class="btn btn-success">删除</a>
                    <a href="{{asset('/admin/album/up/'.$a['id'])}}" class="btn btn-success">修改</a>
                    <a href="{{asset('/admin/album/look/'.$a['id'])}}" class="btn btn-success">查看</a>
                </td>
        @endforeach
            </tr>
    </table>
    {{$album->links()}}
    <style>
        table td,th{text-align: center;}
    </style>
    @endsection