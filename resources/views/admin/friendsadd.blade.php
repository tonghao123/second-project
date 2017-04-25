@extends('model\adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{asset('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{asset('admin/friends')}}">好友管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{asset('/admin/photo/add')}}"><span class="glyphicon glyphicon-plus"></span>新增图片</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">

            <h3><span class="glyphicon glyphicon-picture"></span>添加关系</h3>
            <form action="{{asset('/admin/friends/doadd')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">用户1ID</label>
                    <input type="text" class="form-control" name="user1id">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">用户2ID</label>
                    <input type="text" class="form-control" name="user2id">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">关系</label>
                    <select class="form-control" name="status">
                        <option value="1">用户1关注用户2</option>
                        <option value="3">好友</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-default" value="新建">
            </form>
        </div>
        @if(count($errors) > 0)
            <div class="alert alert-danger" style="width:400px;margin:0 auto;!important;">
                <ul style="list-style: none;">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@endsection