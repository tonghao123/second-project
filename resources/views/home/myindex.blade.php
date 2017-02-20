@extends('model.homemodel')
@section('title','个人主页')
@section('mycss')
    <link href="{{asset('home/css/myindex.css')}}" rel="stylesheet">
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
<div id="bd-main">
    <div class="bd-content" >
        <div id="cover">
            <div class="avatar">
                <div class="figure_con">
                    <figure id="uploadPic"><img width="177" src="{{asset('home/img/default.jpg')}}" id="userpic"></a></figure>
                </div>
            </div>

            <div class="cover-bg" style="background-image: url({{asset('home/img/banner-new.png')}})"><h1 class="avatar_title no_auth">紳士。<span>
                (13人看过)
                <a href="http://help.renren.com/helpcenter#http://help.renren.com/helpcenter/search/getQuestionByMenuId?menuId:'1000217'" class="user-type">
                <img alt="星级" id="star" src="{{asset('home/img/stars.png')}}">
                <span class="more-tip" style="display: none;">
                <span class="tip-content">星级用户</span>
                </span>
                </a></span>
                </h1>
            </div>

            <div id="normal_cover" class="normal_cover">
                <img src="{{asset('home/img/cover_guide2.png')}}">
            </div>
            <div class="comboBox">
                <form method="post" action="">
                    <a href="javascript:;" class="file">修改封面
                        <input type="file" name="photo" id="photo">
                    </a>
                </form>
            </div>
        </div>
        <div id="operate_area" class="clearfix">
            <div class="tl-information">
                 <a class="editinfo" href="{{url('../home/information')}}">编辑资料</a>
            </div>
        </div>
    </div>
</div>
@section('main')
@endsection