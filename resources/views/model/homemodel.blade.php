<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('public/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/home_model.css')}}" rel="stylesheet">
     <link href="{{asset('home/css/footer.css')}}" rel="stylesheet">
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>

    @yield('mycss')
    <title>@yield('title','首页')</title>
</head>
<body>
<!--  **************************** 第一行nav ********************************** -->
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #227DC5;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Will be better</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true">
            <ul class="nav navbar-nav navbar-right">

                @if(Auth::check())
                <li><a href="#" style="padding:10px;"><img src="{{asset('home/img/default_icon.png')}}" height="30" style=""></a></li>
                <li><a href="/login">{{Auth::user()->name}}</a></li>
                <li><a href="/logout">退出</a></li>
                <li style="cursor:default"><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;</a></li>
                @else
                    <li><a href="#" style="padding:10px;"><img src="{{asset('home/img/default_icon.png')}}" height="30" style=""></a></li>
                    <li><a href="/login">登陆</a></li>
                    {{--<li><a href="/logout">退出</a></li>--}}
                    <li style="cursor:default"><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;</a></li>
                @endif
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="搜索的内容">
                <button type="submit" class="btn btn-info">搜索</button>
            </form>
        </div>
    </div>
</nav>

<!-- ***************************** 第一行nav结束 ****************************** -->

<!-- ***************************** 左边的列开始 ******************************* -->
<div id="model_left">
<ul>
<a href="{{asset('/home/index')}}"><li><img src="{{asset('home/img/1.png')}}">首页</li></a>
<a href="{{asset('/home/index')}}"><li><img src="{{asset('home/img/2.png')}}">与我相关</li></a>
<a href="{{asset('/home/myindex')}}"><li><img src="{{asset('home/img/3.png')}}">个人主页</li></a>
<a href="{{asset('/home/photo')}}"><li><img src="{{asset('home/img/4.png')}}">我的相册</li></a>
<a href="{{asset('/home/friends')}}"><li><img src="{{asset('home/img/5.png')}}">好友</li></a>
<a href="{{asset('/home/words')}}"><li><img src="{{asset('home/img/liuyan.png')}}">留言</li></a>
<a href="{{asset('/home/index')}}"><li><img src="{{asset('home/img/yingyong.png')}}">应用</li></a>
<a href="{{asset('/home/index')}}"><li><img src="{{asset('home/img/6.png')}}">热门</li></a>
</ul>
</div>
<!-- ***************************** 左边的列结束 ********************************** -->

<!-- ***************************** 搜索框下的一行开始 ********************************** -->
<div id="change_infof">
    <div id="change_info">
        <ul>
        @section('second')
        <a href=""><li>新鲜事</li></a>
        <a href=""><li>原创内容</li></a>
        <a href=""><li>关注内容</li></a>
            @show()

        </ul>
    </div>
</div>
<!-- ***************************** 搜索框下的一行结束 ********************************** -->
@section('main')
<!-- ***************************** 主内容开始 ********************************** -->
{{--<div class="model_main">--}}
{{--<div style="width:760px;" id="model_main">--}}
    {{--左边的--}}
    {{--@section('model_main_left')--}}
    {{--<div id="model_main_left">--}}
        {{--<div id="indexlog_div">--}}
            {{--<form>--}}
                {{--<textarea cols="30" rows="4" placeholder="请输入" id="indexlog_textarea" ></textarea>--}}
                {{--<div style="width: 500px">--}}
                    {{--<div id="indexlog_img"><input type="file" id="indexlog_imgi" class="file"></div>--}}
                    {{--<div id="indexlog_sub">  <input type="submit" class="btn btn-info"></div>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
        {{--<div id="indexfind">--}}
            {{-- 找人 --}}
            {{--<div id="indexfind_rel">--}}
                {{--<ul id="indexfind_ul">--}}
                    {{--<a href=""><li>找大学同学</li></a>--}}
                    {{--<a href=""><li>找高中同学</li></a>--}}
                    {{--<a href=""><li>找小学同学</li></a>--}}
                    {{--<a href=""><li>找公司同事</li></a>--}}
                {{--</ul>--}}
                {{--<a href=""> 完善更多资料 </a>--}}
            {{--</div>--}}
            {{-- 同学/同事详情 或者 什么时候入学/职 --}}
            {{--<div style="width:350px;float:left;height:310px;background-color:#fff;">ss</div>--}}
        {{--</div>--}}
        {{--广告--}}
        {{--<div id="index_ad">--}}
            {{--<a href="http://www.4399.com/flash/182762_2.htm" target="_blank"><img src="{{asset('home/img/ad.jpg')}}" title="点了会很爽" width="500" ></a>--}}
        {{--</div>--}}
        {{--{{dd($comment)}}--}}
        {{-- 朋友圈内容 --}}

        {{--@forelse($comment as $val)--}}
        {{--<div class="index_friends">--}}
            {{--<div class="index_onefriend">--}}
                {{--<!-- 头像 -->--}}
                {{--<div class="index_friendimg" >--}}
                    {{--<img src="{{$val->icon or asset('home/img/default_icon.png')}}" width="50">--}}
                {{--</div>--}}
                {{--<!-- 谁什么时候发表什么 -->--}}
                {{--<div class="index_friendinfo">--}}
                    {{--<div>--}}
                        {{--<div style="float: left">{{$val->name}}</div>--}}
                        {{--<div style="float: right;">下箭头</div>--}}
                    {{--</div>--}}
                    {{--<div><br>向好友发布状态</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="index_friendstext">--}}
                {{--这是test--}}
            {{--</div>--}}
            {{-- 判断图片大小 大于500或者高于多少应该就定死  小于就可以 --}}
            {{--<div>--}}
                {{--<img src="{{asset('home/img/default_icon.png')}}" width="500">--}}
            {{--</div>--}}
            {{-- 点赞分享 --}}
            {{--<div class="index_friendssure">--}}
                {{--<a href="" class="btn btn-default">点赞</a>&nbsp; &nbsp;--}}
                {{--<a href="" class="btn btn-default">分享</a>--}}
            {{--</div>--}}
            {{-- 评论区域 --}}
{{--+++++++++++++++++++++++++++评论开始++++++++++++++++++++++++++++++++++++++++++--}}

            {{--<div class="index_comment">--}}
                {{---------------判断文章的评论数大于2条时隐藏---------------------}}
                {{--@if(count($cont) > 2)--}}
                    {{--<div class="limit">--}}
                    {{--@forelse($cont as $v)--}}
                        {{--<div class="index_friendscomment_list">--}}
                            {{--查询用户的头像和用户的name--}}
                            {{--<img src="{{$v->avatar}}" height="30" style="float: left;margin-bottom:10px;"><span style="line-height:30px;"> &nbsp;</span>--}}
                            {{--<div class="index_friendscomment_content">--}}
                                {{--<p><span class="friends_name"><a>{{$v->name}}</a></span><span class="friends_time">{{$v->utime_c}}</span>--}}
                                   {{--<svg class="icon" aria-hidden="true">--}}
                                        {{--<use xlink:href="#icon-dianzan"></use>--}}
                                    {{--</svg>+--}}
                                    {{--<span class="tt">{{$v->num}}</span>--}}
                                    {{--判断是否是本用户--}}
                                    {{---------------------------------------------------------------------}}
                                    {{--@if(Auth::check())--}}
                                        {{--遍历得到评论的用户--}}
                                        {{--@if(Auth::user()->name == $v->name)--}}
                                            {{--<span class="friends_delete"><a class="delete" href="/home/comment/delete/{{$v->id_c}}" >删除</a><a class="zan" value="{{$v->id_c}}">赞</a><a class="zan2" value="{{$v->id_c}}" style="display: none;">取消</a></span>--}}
                                        {{--@else--}}
                                            {{--<span class="friends_zan"><a>回复</a><a class="zan" value="{{$v->id_c}}">赞</a><a class="zan2" value="{{$v->id_c}}" style="display: none;">取消</a></span>--}}
                                        {{--@endif--}}
                                    {{--@else--}}
                                        {{--<span></span>--}}
                                    {{--@endif--}}
                                {{--</p>--}}
                                {{--<p> {!! $v->content_c !!} </p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@empty--}}
                    {{--@endforelse--}}
                    {{--</div>--}}
                    {{--@else--}}
                {{--@forelse($cont as $v)--}}
                    {{--<div class="index_friendscomment_list">--}}
                        {{--查询用户的头像和用户的name--}}
                        {{--<img src="{{$v->avatar}}" height="30" style="float: left;margin-bottom:10px;"><span style="line-height:30px;"> &nbsp;</span>--}}
                        {{--<div class="index_friendscomment_content">--}}
                            {{--<p>--}}
                                {{--<span class="friends_name">--}}
                                    {{--<a>{{$v->name}}</a>--}}
                                {{--</span>--}}
                                {{--<span class="friends_time">{{$v->utime_c}}</span>--}}
                                {{--<svg class="icon" aria-hidden="true">--}}
                                    {{--<use xlink:href="#icon-dianzan"></use>--}}
                                {{--</svg>--}}
                                {{--<span class="tt">{{$v->num}}</span>--}}
                                {{--判断是否是本用户--}}
                                {{---------------------------------------------------------------------}}
                                {{--@if(Auth::check())--}}
                                    {{--遍历得到评论的用户--}}
                                    {{--@if(Auth::user()->name == $v->name)--}}
                                    {{--<span class="friends_delete"><a class="delete" href="/home/comment/delete/{{$v->id_c}}" >删除</a><a class="zan" value="{{$v->id_c}}">赞</a></span>--}}
                                    {{--@else--}}
                                    {{--<span class="friends_zan"><a class="receive">回复</a><a class="zan" value="{{$v->id_c}}">赞</a></span>--}}
                                    {{--@endif--}}
                                {{--@else--}}
                                    {{--<span></span>--}}
                                {{--@endif--}}
                            {{--</p>--}}
                            {{--<p> {!! $v->content_c !!} </p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--@empty--}}
                    {{--@endforelse--}}
                {{--@endif--}}
                {{--======================================================jq添加赞=============================================--}}
                {{--<script>--}}
                    {{--$(function(){--}}
                        {{--$('.index_comment .zan').on('click', function(){--}}
                          {{--var $cid=$(this).attr('value');--}}
                          {{--$(this).hide();--}}
                          {{--$(this).siblings('.zan2').show();--}}
                          {{--$_this = $(this);--}}
                            {{--$.ajax({--}}
                                {{--url:'/home/comment/zan/'+$cid,--}}
                                {{--type:'get',--}}
                                {{--success:function(data){--}}
                                    {{--var a  = parseInt(data);--}}
                                    {{--$_this.parents().siblings('.tt').text(a);--}}
                                {{--},--}}
                                {{--error:function(){--}}
                                    {{--alert('点赞失败！');--}}
                                {{--},--}}
                                {{--async:true--}}
                            {{--})--}}
                        {{--})--}}
                        {{--$('.index_comment .zan2').on('click', function(){--}}
                            {{--var $cid=$(this).attr('value');--}}
                            {{--$(this).hide();--}}
                            {{--$(this).siblings('.zan').show();--}}
                            {{--$_this = $(this);--}}
                            {{--$.ajax({--}}
                                {{--url:'/home/comment/zan2/'+$cid,--}}
                                {{--type:'get',--}}
                                {{--success:function(data){--}}
                                    {{--var a  = parseInt(data);--}}
                                    {{--$_this.parents().siblings('.tt').text(a);--}}
                                {{--},--}}
                                {{--error:function(){--}}
                                    {{--alert('取消失败！');--}}
                                {{--},--}}
                                {{--async:true--}}
                            {{--})--}}
                        {{--})--}}
                    {{--})--}}
                {{--</script>--}}
                {{-------------------------------------------------------------------------------------------}}
                {{--<div class="limit_more"><a>显示更多评论</a></div>--}}
                {{--<form method="post" action="/home/comment/add" name="comment_form">--}}
                {{--<div class="index_friendscomment">--}}
                    {{--@if(Auth::check())--}}
                        {{--<img src="{{$icon}}" height="30" style="float: left;margin-bottom:10px;"><span style="line-height:30px;"> &nbsp;</span>--}}
                    {{--@else--}}
                        {{--<img src="{{asset('home/img/default_icon.png')}}" height="30" style="float: left;margin-bottom:10px;"><span style="line-height:30px;"> &nbsp;</span>--}}
                    {{--@endif--}}
                    {{--{{csrf_field()}}--}}
                        {{--<input type="hidden" value="{{Auth::user()->id}}" name="uid">--}}
                        {{--<input type="hidden" value="{{$val->id}}" name="tid">--}}
                        {{--<input type="hidden" value="{{$val->uid}}" name="tuid">--}}
                    {{--<textarea name='1' maxlength="150" class="index_friendstextarea  form-control" type="text"  data-var="@heading-color" placeholder="评论..." style="width: 415px;height:30px;"></textarea>--}}
                        {{--@include('/home/face')--}}
                        {{--<span class="index_friendshint"><span class="index_changenum">0</span>/150字</span>--}}
                    {{--<button onclick="form.submit()" class="index_friendssureinfo btn btn-success btn-sm" style="display: none;">评论</button>--}}
                {{--</div></form>--}}
            {{--</div>--}}

{{-------------------------------------评论结束---------------------------------------}}
        {{--</div>--}}
        {{--@empty--}}
            {{--<p>空空空</p>--}}
        {{--@endforelse--}}
    {{--</div>--}}
    {{--@show()--}}
    {{-- 右边的 --}}
    {{--<div id="model_main_right" style="width:240px;float: left">--}}
        {{--@include('/home/Intergral/index')--}}
        {{--<iframe src="{{url('/date')}}" frameborder="0" height="750px" width="240px" scrolling="no" style="background-color: #fff;margin-top: 20px;overflow: hidden;">--}}
        {{--</iframe>--}}
        {{--<iframe id='box' src="{{url('/news')}}" frameborder="0" height="780px" width="240px" scrolling="no" style="background-color: #fff;margin-top: 20px;overflow: hidden;">--}}
        {{--</iframe>--}}
    {{--</div>--}}
{{--</div>--}}
{{--</div>--}}
<!-- ***************************** 主内容结束 ********************************** -->
@show()

@section('foot')
    <div id="footer" style="width: 1349px;margin: 0 auto">
        <div class="ft-wrapper clearfix" style="width: 980px;margin-right: 187px;">
            <p>
                <strong>玩转人人</strong>
                <a href="http://page.renren.com/register/regGuide/" target="_blank">公共主页</a>
                <a href="http://zhibo.renren.com" target="_blank">美女直播</a>
                <a href="http://support.renren.com/helpcenter" target="_blank">客服帮助</a>
                <a href="http://www.renren.com/siteinfo/privacy" target="_blank">隐私</a>
            </p>
            <p>
                <strong>商务合作</strong>
                <a href="http://page.renren.com/marketing/index" target="_blank">品牌营销</a>
                <a href="http://bolt.jebe.renren.com/introduce.htm" class="l-2" target="_blank">中小企业<br>自助广告</a>
                <a href="http://dev.renren.com/" target="_blank">开放平台</a>
                <a href="http://dsp.renren.com/dsp/index.htm" target="_blank">人人DSP</a>
            </p>
            <p>
                <strong>公司信息</strong>
                <a href="http://www.renren-inc.com/zh/product/renren.html" target="_blank">关于我们</a>
                <a href="http://page.renren.com/gongyi" target="_blank">人人公益</a>
                <a href="http://www.renren-inc.com/zh/hr/" target="_blank">招聘</a>
                <a href="#nogo" id="lawInfo">法律声明</a>
            </p>
            <p>
                <strong>友情链接</strong>
                <a href="http://fenqi.renren.com/" target="_blank">人人分期</a>
                <a href="https://licai.renren.com/" target="_blank">人人理财</a>
                <a href="http://www.woxiu.com/" target="_blank">我秀</a>
                <a href="http://zhibo.renren.com/" target="_blank">人人直播</a>
                <a href="http://www.huanlj.com/i/34886/www.renren.com" target="_blank">人人网</a>
            </p>
            <p>
                <strong>人人移动客户端下载</strong>
                <a href="http://mobile.renren.com/showClient?v=platform_rr&amp;psf=42064" target="_blank">iPhone/Android</a>
                <a href="http://mobile.renren.com/showClient?v=platform_hd&amp;psf=42067" target="_blank">iPad客户端</a>
                <a href="http://mobile.renren.com" target="_blank">其他人人产品</a>
            </p>
            <!--<p class="copyright-info">-->
            <!-- 临时添加公司信息用 -->
            <p class="copyright-info">
                <span>公司全称：北京千橡网景科技发展有限公司</span>
                <span>公司电话：010-84481818</span>
                <span><a href="mailto:admin@renren-inc.com">公司邮箱：admin@renren-inc.com</a></span>
                <span>公司地址：北京市朝阳区酒仙桥中路18号<br>国投创意信息产业园北楼5层</span>
                <span>违法和不良信息举报电话：027-87676735</span>
                <span><a href="http://jubao.12377.cn:13225/reportinputcommon.do" target="_blank"><img style="height: 22px;float: left; margin-left: 78px;" src="http://s.xnimg.cn/imgpro/civilization/jubaologoNew.png">网上有害信息举报中心</a></span>
                <span><img id="wenhuajingying_icon" style="height: 28px;float: left; margin-left: 60px;" src="http://s.xnimg.cn/imgpro/civilization/wenhuajingying.png"><a href="http://sq.ccm.gov.cn/ccnt/sczr/service/business/emark/toDetail/DFB957BAEB8B417882539C9B9F9547E6" target="_blank">京网文[2013]0136-030号</a></span>
                <span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP证090254号</a></span>
                <span>人人网©2016</span>
            </p>
        </div>
    </div>

@show()

<!-- **************************** jquery开始到最后 ********************************* -->
<script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{asset('home/js/home_model.js')}}"></script>
<script src="{{asset('home/js/comment.js')}}"></script>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@section('my_js')
    @show()


</body>
</html>