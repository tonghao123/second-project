<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>积分管理</title>

    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="apple-touch-icon" href="http://a.xnimg.cn/wap/apple_icon_.png">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{--引入css--}}
    <link rel='stylesheet' href="{{asset('home/css/Intergral.css')}}">
    {{--引入图标--}}
    <script src="{{asset('home/css/iconfont/iconfont.js')}}"></script>
    {{--引入js--}}
    <script src='{{asset("js/jquery-1.8.3.min.js")}}'></script>
</head>
{{--使用js实现选项卡的切换--}}
<body>
<div id='lifes'>
    <ul id='optiond'>
        <li class='active'>攒人品</li>
        <li>最近来访</li>
        {{--用户的来访个数--}}
        <li>生日提醒</li>
    </ul>
    <ul id='card'>
        <li class='active'>
            {{--js计时3600秒切换还原图片zan01/zan--}}
            <a href="{{url('home/intergral/timeD')}}"><div class="rp_01"><span class="zan"><img src="{{asset('home/img/zan01.png')}}"></span><div class="zanTop"></div><div id="rp_01_Up">点击即可随机获取人品值</div></div></a>
            {{--统计总rp 今日rp--}}
            <a href="{{url('/home/character')}}"><div class="rp_02"><p id="pp">总RP值：<span>{{$rpz or 0}}</span></p><p id="pp">今日RP值：<span>{{$rpd or 0}}</span></p><div id="rp_02_Up">点击查看更多</div></div></a>
            {{--刷新的rp,rp值不能超过2位数--}}
            <a><div class="rp_03"><p>刷新已得</p><span>{{$rpf or 0}}</span>RP
                    <div id="rp_032_Up">立即刷新页面即可获得1点RP</div>
                    <div id="rp_03_Up">每半小时刷新页面可获得1点RP，距离下<br>次还有
                        {{$sub}}。
                    </div>
                </div>
            </a>

            <div id="help"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-wenhao"></use></svg>
                <div id="rp_Help_Up">
                    <h5>什么是攒人品？</h5>
                    <dl>
                        <dd><div class="helpList"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-duigou"></use></svg><span>人品值=Renren Power,是你长期混迹于人人网的象征</span></div></dd>
                        <dd><div class="helpList"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-duigou"></use></svg><span>每日点击一下"攒"可随机获得一定人品值</span></div></dd>
                        <dd><div class="helpList"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-duigou"></use></svg><span>每半小时刷新页面，也可得到1点人品值</span></div></dd>
                        <dd><div class="helpList"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-duigou"></use></svg><span>积攒来的人品值可以兑换各种心仪的礼品</span></div></dd>
                    </dl>
                </div>
            </div>
        </li>
        <li>
            {{--当没访问者时显示这，后台遍历来访的用户--}}
{{--            @if(isset($visit))--}}
                <div id="visit">
                    <div id="visitTop">
                        <div id="visitTopLeft">{{0}}人</div>
                        <div id="visitTopRight">
                            <a href="{{url('home/comeToVisit')}}"><div class="visitMore">
                                <svg class="icon" aria-hidden="true">
                                    <use xlink:href="#icon-dian"></use>
                                </svg>
                                <div id="visit_more_Up">更多来访</div>
                            </div></a>
                            {{--做隐藏--}}
                            <div class="visitCut">
                            <svg class="icon left" aria-hidden="true">
                                <use xlink:href="#icon-fanhui"></use>
                            </svg><div id="visit_left_Up">上一页</div>
                            <svg class="icon right" aria-hidden="true">
                                <use xlink:href="#icon-jinru"></use>
                            </svg><div id="visit_right_Up">下一页</div>
                            </div>
                        </div>
                    </div>
                    <div id="visitMain">
{{--                        @foreach($visiter as $v)--}}
                            <div class="visitIcon"><div id="visit_01_Up">{{ '好友'}}</div></div>
                            {{--@endforeach--}}
                    </div>
                </div>
                {{--@else--}}
                <div id="visitNull"><p>
                <svg class="icon" aria-hidden="true">
                     <use xlink:href="#icon-daku"></use>
                </svg>还没有人来访问过你的页面</p>
                </div>
                {{--@endif--}}
        </li>
        {{--好友生日提醒--}}
        <li>
            {{--当一周内没有好友的生日显示下面--}}
            <div id="birthday">
                <p class="birthMore">
                    <a href="{{url('/home/calendar')}}"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-dian"></use></svg></a>
                </p>
                <div id="birth_more_Up">更多好友生日</div>
                <div class="birthList"><span>最近一周没有好友过生日哦</span></div>
                <img src="{{asset('home/img/birthday.png')}}">
            </div>
        </li>
    </ul>
</div>

{{--------------------------------------------------------------------------------------------------------}}
{{--<div id="referee">--}}
    {{--<div id="refereeTop"><h5>推荐好友</h5>--}}
        {{--<a><svg class="icon change" aria-hidden="true">--}}
            {{--<use xlink:href="#icon-dian"></use>--}}
        {{--</svg><div id="referee_more_Up">更多推荐</div>--}}
        {{--</a>--}}
        {{--<a><svg class="icon more" aria-hidden="true">--}}
            {{--<use xlink:href="#icon-jiantouyou"></use>--}}
        {{--</svg><div id="referee_Up">换一组</div>--}}
        {{--</a>--}}
    {{--</div>--}}
    {{--推荐好友，遍历--}}
    {{--<div id="refereeList">--}}
            {{--<div id="listFriend">--}}
                {{--<b>{{'可能认识'}}</b>--}}
                {{--<a><svg class="icon jian" aria-hidden="true">--}}
                        {{--<use xlink:href="#icon-cha"></use>--}}
                    {{--</svg><div id="friend_jian_Up">不再推荐</div>--}}
                {{--</a>--}}
                {{--<img src="{{ url('home/img/icon.gif')}}" width="68px" height="68px">--}}
                {{--<div><p>{{'XXXXXX'}}</p>--}}
                    {{--<span><svg class="icon jia" aria-hidden="true">--}}
                            {{--<use xlink:href="#icon-jia"></use>--}}
                          {{--</svg><div id="friend_jia_Up">关注好友</div>--}}
                    {{--</span>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{----}}
    {{--</div>--}}
{{--</div>--}}

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
{{--引入Intergral.js--}}
<script src="{{asset('home/js/Intergral.js')}}"></script>
</body>
</html>

