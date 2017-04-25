@extends('model\adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{asset('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{asset('admin/diary')}}">日志管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{asset('admin/diary/add')}}"><span class="glyphicon glyphicon-plus"></span>新增日志</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">
            <h3><span class="glyphicon glyphicon-pencil"></span>查看日志</h3>
            <form action="{{asset('/admin/diary/doup/'.$arr['id'])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">日志ID</label>
                <input type="text" class="form-control" name="id"  value="{{$arr['id']}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">用户ID</label>
                <input type="text" name="uid" class="form-control" value="{{$arr['uid']}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">日志标题</label>
                <input type="text" name="title" class="form-control" value="{{$arr['title']}}" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">日志内容</label>
                {{--<input type="text" class="form-control" value="{{$arr['content']}}" disabled>--}}
                <textarea name="content"  class="form-control" id="" cols="30" rows="10"  style="resize: none">{{$arr['content']}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">状态</label>
                <select class="form-control" name="cstate" >
                    <option value="1" {{$arr['cstate']==1?'selected':''}}>公开</option>
                    <option value="2" {{$arr['cstate']==1?'':'selected'}}>不公开</option>
                </select>
            </div>
            <a href="{{asset('admin/diary')}}" class="btn btn-info">返回日志管理</a>
            <input type="submit" value="更新" class="btn btn-default">
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