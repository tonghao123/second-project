@extends('model\homemodel')

@section('main')
    <div class="model_main">
        <div style="width:760px;" id="model_main">
            {{--左边的--}}
            @section('model_main_left')
                <div id="model_main_left">
                    <div id="indexlog_div">
                        <form>
                            <textarea cols="30" rows="4" placeholder="请输入" id="indexlog_textarea" ></textarea>
                            <div style="width: 500px">
                                <div id="indexlog_img"><input type="file" id="indexlog_imgi" class="file"></div>
                                <div id="indexlog_sub">  <input type="submit" class="btn btn-info"></div>
                            </div>
                        </form>
                    </div>
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
                    <div id="index_ad">
                        <a href="http://www.4399.com/flash/182762_2.htm" target="_blank"><img src="{{asset('home/img/ad.jpg')}}" title="点了会很爽" width="500" ></a>
                    </div>
                    {{--{{dd($comment)}}--}}
                    {{-- 朋友圈内容 --}}

                    @forelse($comment as $val)
                        <div class="index_friends">
                            <div class="index_onefriend">
                                <!-- 头像 -->
                                <div class="index_friendimg" >
                                    <img src="{{$val->icon or asset('home/img/default_icon.png')}}" width="50">
                                </div>
                                <!-- 谁什么时候发表什么 -->
                                <div class="index_friendinfo">
                                    <div>
                                        <div style="float: left">{{$val->name}}</div>
                                        <div style="float: right;">下箭头</div>
                                    </div>
                                    <div><br>向好友发布状态</div>
                                </div>
                            </div>
                            <div class="index_friendstext">
                                这是test
                            </div>
                            {{-- 判断图片大小 大于500或者高于多少应该就定死  小于就可以 --}}
                            <div>
                                <img src="{{asset('home/img/default_icon.png')}}" width="500">
                            </div>
                            {{-- 点赞分享 --}}
                            <div class="index_friendssure">
                                <a href="" class="btn btn-default">点赞</a>&nbsp; &nbsp;
                                <a href="" class="btn btn-default">分享</a>
                            </div>
                            {{-- 评论区域 --}}
                            {{--+++++++++++++++++++++++++++评论开始++++++++++++++++++++++++++++++++++++++++++--}}

                            <div class="index_comment">
                                {{---------------判断文章的评论数大于2条时隐藏---------------------}}
                                @if(count($cont) > 2)
                                    <div class="limit">
                                        @forelse($cont as $v)
                                            <div class="index_friendscomment_list">
                                                {{--查询用户的头像和用户的name--}}
                                                <img src="{{$v->avatar}}" height="30" style="float: left;margin-bottom:10px;"><span style="line-height:30px;"> &nbsp;</span>
                                                <div class="index_friendscomment_content">
                                                    <p><span class="friends_name"><a>{{$v->name}}</a></span><span class="friends_time">{{$v->utime_c}}</span>
                                                        <svg class="icon" aria-hidden="true">
                                                            <use xlink:href="#icon-dianzan"></use>
                                                        </svg>+
                                                        <span class="tt">{{$v->num}}</span>
                                                        {{--判断是否是本用户--}}
                                                        {{---------------------------------------------------------------------}}
                                                        @if(Auth::check())
                                                            {{--遍历得到评论的用户--}}
                                                            @if(Auth::user()->name == $v->name)
                                                                <span class="friends_delete"><a class="delete" href="/home/comment/delete/{{$v->id_c}}" >删除</a><a class="zan" value="{{$v->id_c}}">赞</a><a class="zan2" value="{{$v->id_c}}" style="display: none;">取消</a></span>
                                                            @else
                                                                <span class="friends_zan"><a>回复</a><a class="zan" value="{{$v->id_c}}">赞</a><a class="zan2" value="{{$v->id_c}}" style="display: none;">取消</a></span>
                                                            @endif
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </p>
                                                    <p> {!! $v->content_c !!} </p>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                @else
                                    @forelse($cont as $v)
                                        <div class="index_friendscomment_list">
                                            {{--查询用户的头像和用户的name--}}
                                            <img src="{{$v->avatar}}" height="30" style="float: left;margin-bottom:10px;"><span style="line-height:30px;"> &nbsp;</span>
                                            <div class="index_friendscomment_content">
                                                <p>
                                <span class="friends_name">
                                    <a>{{$v->name}}</a>
                                </span>
                                                    <span class="friends_time">{{$v->utime_c}}</span>
                                                    <svg class="icon" aria-hidden="true">
                                                        <use xlink:href="#icon-dianzan"></use>
                                                    </svg>
                                                    <span class="tt">{{$v->num}}</span>
                                                    {{--判断是否是本用户--}}
                                                    {{---------------------------------------------------------------------}}
                                                    @if(Auth::check())
                                                        {{--遍历得到评论的用户--}}
                                                        @if(Auth::user()->name == $v->name)
                                                            <span class="friends_delete"><a class="delete" href="/home/comment/delete/{{$v->id_c}}" >删除</a><a class="zan" value="{{$v->id_c}}">赞</a></span>
                                                        @else
                                                            <span class="friends_zan"><a class="receive">回复</a><a class="zan" value="{{$v->id_c}}">赞</a></span>
                                                        @endif
                                                    @else
                                                        <span></span>
                                                    @endif
                                                </p>
                                                <p> {!! $v->content_c !!} </p>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                @endif
                                {{--======================================================jq添加赞=============================================--}}
                                <script>
                                    $(function(){
                                        $('.index_comment .zan').on('click', function(){
                                            var $cid=$(this).attr('value');
                                            $(this).hide();
                                            $(this).siblings('.zan2').show();
                                            $_this = $(this);
                                            $.ajax({
                                                url:'/home/comment/zan/'+$cid,
                                                type:'get',
                                                success:function(data){
                                                    var a  = parseInt(data);
                                                    $_this.parents().siblings('.tt').text(a);
                                                },
                                                error:function(){
                                                    alert('点赞失败！');
                                                },
                                                async:true
                                            })
                                        })
                                        $('.index_comment .zan2').on('click', function(){
                                            var $cid=$(this).attr('value');
                                            $(this).hide();
                                            $(this).siblings('.zan').show();
                                            $_this = $(this);
                                            $.ajax({
                                                url:'/home/comment/zan2/'+$cid,
                                                type:'get',
                                                success:function(data){
                                                    var a  = parseInt(data);
                                                    $_this.parents().siblings('.tt').text(a);
                                                },
                                                error:function(){
                                                    alert('取消失败！');
                                                },
                                                async:true
                                            })
                                        })
                                    })
                                </script>
                                {{-------------------------------------------------------------------------------------------}}
                                <div class="limit_more"><a>显示更多评论</a></div>
                                <form method="post" action="/home/comment/add" name="comment_form">
                                    <div class="index_friendscomment">
                                        @if(Auth::check())
                                            <img src="{{$icon}}" height="30" style="float: left;margin-bottom:10px;"><span style="line-height:30px;"> &nbsp;</span>
                                        @else
                                            <img src="{{asset('home/img/default_icon.png')}}" height="30" style="float: left;margin-bottom:10px;"><span style="line-height:30px;"> &nbsp;</span>
                                        @endif
                                        {{csrf_field()}}
                                        <input type="hidden" value="{{Auth::user()->id}}" name="uid">
                                        <input type="hidden" value="{{$val->id}}" name="tid">
                                        <input type="hidden" value="{{$val->uid}}" name="tuid">
                                        <textarea name='1' maxlength="150" class="index_friendstextarea  form-control" type="text"  data-var="@heading-color" placeholder="评论..." style="width: 415px;height:30px;"></textarea>
                                        @include('/home/face')
                                        <span class="index_friendshint"><span class="index_changenum">0</span>/150字</span>
                                        <button onclick="form.submit()" class="index_friendssureinfo btn btn-success btn-sm" style="display: none;">评论</button>
                                    </div></form>
                            </div>

                            {{-------------------------------------评论结束---------------------------------------}}
                        </div>
                    @empty
                        <p>空空空</p>
                    @endforelse
                </div>
            @show()
            {{-- 右边的 --}}
            <div id="model_main_right" style="width:240px;float: left">
                @include('/home/Intergral/index')
                <iframe src="{{url('/date')}}" frameborder="0" height="750px" width="240px" scrolling="no" style="background-color: #fff;margin-top: 20px;overflow: hidden;">
                </iframe>
                <iframe id='box' src="{{url('/news')}}" frameborder="0" height="780px" width="240px" scrolling="no" style="background-color: #fff;margin-top: 20px;overflow: hidden;">
                </iframe>
            </div>
        </div>
    </div>
    @endsection
