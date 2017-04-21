@extends('model\homemodel')

@section('title')
    我的相册
    @endsection

@section('mycss')
    <link href="{{asset('home/css/photo.css')}}" rel="stylesheet">
    @endsection

@section('second')
    <a href=""><li>我的主页</li></a>
    <a href=""><li>资料</li></a>
    <a href=""><li>相册</li></a>
    <a href=""><li>分享</li></a>
    <a href=""><li>状态</li></a>
    <a href=""><li>日志</li></a>
    <a href=""><li>好友</li></a>
    @endsection

@section('main')
    <div id="photo_second">
        <div id="photo_ulf" >
            <ul id="photo_ul">
                <a href=""><li>我的相册</li></a>
                <a href=""><li>最近照片</li></a>
            </ul>
            <div class="photo_inright">
                <a class="btn btn-default"><span class="glyphicon glyphicon-open"></span>上传照片</a>
                <a class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>新建相册</a>
            </div>
        </div>    <!-- 这是我的相册第一行 -->
        <div class="photo_photos">
            <div class="photo_photo">
                <div class="photo_img">
                    <a href=""><img src="{{asset('home/img/4.jpg')}}" width="230" height="160"></a>
                </div>
                <div class="photo_from">
                    <a href="">这是照片集的名字</a>
                    <span>公开相册</span>
                </div>
            </div>
            <div class="photo_photo">
                <div class="photo_img"><img></div>
                <div></div>
            </div>
            <div class="photo_photo">
                <div class="photo_img"><img></div>
                <div></div>
            </div>
        </div>
        <div class="photo_anniu">
             <a class="btn btn-default" href="">更多照片集</a>
        </div>

    </div>
    @endsection
@section('myjs')

    @endsection


























