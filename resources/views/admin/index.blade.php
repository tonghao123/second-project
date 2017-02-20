@extends('model.adminmodel')
@section('amodel_main')
    <table class="table table-hover table-striped table-bordered">
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>性别</th>
            <th>邮箱</th>
            <th>学校信息</th>
            <th>工作信息</th>
            <th>基本信息</th>
            <th>喜欢</th>
            <th>操作</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->sex}}</td>
            <td>{{$user->email}}</td>
            <td><a href="/showschool" class="btn btn-info">查看</a></td>
            <td><a href="/showwork" class="btn btn-info">查看</a></td>
            <td><a href="/showinformation" class="btn btn-info">查看</a></td>
            <td><a href="/showlike" class="btn btn-info">查看</a></td>
            <td>
                <a href="/admin/index/{{$user->id}}" class="btn btn-success">删除</a>
                <a href="/admin/showadd" class="btn btn-success">添加</a>
            </td>

        </tr>
        @endforeach
    </table>
    <style>
        table td,th{text-align: center;}
    </style>
@endsection