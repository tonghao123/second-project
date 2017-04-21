@extends('model.homemodel')
@section('mycss')
    <link href="{{asset('home/css/diary.css')}}" rel="stylesheet">
@endsection

@section('main')
    <div class="ugc-list-left">
        <div class="ugc-left-header">
            <div id="blogList_tabBox" class="ugc-header-left">
                <a href="#nogo" id="blogList_myblogTab"  class="ugc-header-a headhover"><span class="ugc-header-span">我的日志</span></a>
            </div>

            <div class="ugc-header-right">
                <a href="http://hui.dev/home/writediary" class="btn btn-default" style="padding: 4px 12px"><img src="{{asset('home/img/addBlog.png')}}" ></a>
                <div class="btn btn-default" style="padding: 4px 12px" id="more" title="批量管理">
                    <img src="{{asset('home/img/more.png')}}">
                </div>
            </div>

        </div>

        <div class="ugc-left-content">
            <div id="blogList_listBox" class="ugc-left-list">
                <!--我的日志-->
                <div id="blogList_myblogBox" style="float: left;">
                    <ul id="blogList_myblogUl" class="ugc-list-ul" style="float: left;">


                        <li class="ugc-list-item">
                            <div class="ugc-item-info">
                                <h3 class="blogList-info-title" id="title">
                                    title
                                </h3>
                                <div class="ugc-release-msgs">
                                <span>
                                    <span title="" class="privacy-trigger privacy-trigger-small " id="privacy_3602879702888446028">
                                        <i class="privacy-icon picon-public"></i>
                                        <span>权限</span><input type="hidden" value="" name="privacyParams">
                                    </span>
                                </span>&nbsp;-&nbsp;
                                    <span>time</span>
                                </div>
                                <div class="ugc-item-abstract">
                                    哈哈...
                                </div>
                                <div class="ugc-item-focused" style="width: 100%;">


                                    <div class="blogList-focused-right" id="handle">
                                        <a href="" class="two">编辑</a>
                                        &nbsp;&nbsp;|&nbsp;
                                        <a href="" class="two">删除</a>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                    <!--分页-->
                    <div id="blogList_myblogPage" class="blogList-page clearfix">

                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    var box = document.getElementById('blogList_listBox');
    var title = document.getElementById('title');
    var handle = document.getElementById('handle');
    var two = handle.getElementsByClassName('two');
    box.onmouseover = function(){
        this.style.backgroundColor = '#F3F6F8';
        this.style.cursor = 'pointer';
        title.style.color = '#227dc5';
        handle.style.display = 'block';
        two[0].style.color = '#227dc5';
        two[1].style.color = '#227dc5';
    }
    box.onmouseout = function(){
        this.style.backgroundColor = '#fff';
        title.style.color = '#333';
        handle.style.display = 'none';
        two.style.color = '#333';
    }

</script>


@endsection