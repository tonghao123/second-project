@extends('model.homemodel')
@section('mycss')
    <link href="{{asset('home/css/writediary.css')}}" rel="stylesheet">
@endsection
@section('fresh')
@endsection
@section('main')
<div id="write">
    <form action="{{asset('home/dophoto')}}" method="post" enctype="multipart/form-data" id="write_from" multiple>
        <div id="addblog-left" class="addblog-box">
            <div id="addBlog_editorWrap">
                <div id="addBlog_blogTitle_box">
                    <textarea placeholder="输入日志标题" name="title" id="addBlog_blogTitle" minheight="30" maxheight="1000"></textarea>
                </div>
                <div class="mceLayout">
                        <div class="menu">
                            <div class="add">添加&nbsp;:
                                {{csrf_field()}}
                                <a type="submit" class="btn btn-info wtg" style="padding-top:4px; padding-bottom:4px;"  id="dobrow">表情</a>
                                <a href="" class="file">选择照片
                                        <input type="file" name="pic[]" id="photo" multiple>
                                </a>
                                {{--<a class="btn btn-info wtg" style="padding-top:4px; padding-bottom:4px;" id="dophotoa" value="">使用选择的图片</a>--}}
                            </div>
                        </div>
                    <!--- 能填入 -->
                    <div id="word">
                        {{-- 能填入图片的 --}}
                        {{--<div id="myDiv" onclick="getPos();"   onkeyup="getPos();"  contenteditable="true" >--}}
                        {{--</div>--}}
                        <textarea id="myDiv" name="content" style="resize:none"></textarea>
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    </div>
                </div>
            </div>
            <div id="addBlog_editorButtons">
                <a  href="{{asset('/home/diary')}}" type="button" id="cancel" class="btn btn-default" value="">取消</a>
                <select name="cstate" style="height:33px;">
                    <option value="1">公开</option>
                    <option value="2">不公开</option>
                </select>
                <input type="submit" id="push" class="btn btn-info" value="发布日志" tabindex="4">
            </div>
        </div>
        <div id="addblog-right" >
            <div class="btn-group">
                {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                   {{--限制 <span class="caret"></span>--}}
                {{--</button>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a>公开</a></li>--}}
                    {{--<li><a>仅自己可见</a></li>--}}
                    {{--<li><a>好友可见</a></li>--}}
                {{--</ul>--}}
                 @if(count($errors))
                    <ul class="alert alert-danger" style="width:100px;height:100px;!important;">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                 @endif
            </div>
        </div>
    </form>
</div>
{{-- /小表情的图标开始 --}}
<div class="diary_brow" >
    <div class="diary_brow1">
        <img src="{{asset('home/img/rr_brow/default.png')}}" style="border-bottom:3px solid blue">
        <span class="glyphicon glyphicon-remove" id="docuo" style="float:right;margin-right:15px;line-height:30px;"></span>
    </div>
    <div class="diary_brow2">
        <ul>
           @for($i=1;$i<72;$i++)
            <li ze="{{$i}}"><img src="{{asset('home/img/rr_brow/'.$i.'.gif')}}" width="20" height="20" ></li>
               @endfor
        </ul>
    </div>
</div>
{{-- 小表情结束 --}}

<script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
<script  >

//    var pos;
//    function getPos()
//    {
//        pos = document.selection.createRange();
//    }
//
//    function fun(str)
//    {
//        if(pos!=null)
//        {
//            pos.pasteHTML("<img src=\""+str+"\">");
//            pos=null;
//        }
//        else
//        {
//            alert("没有正确选择位置");
//        }
//    }
    $(function(){
        $('#dobrow').click(function(){
            $('.diary_brow').css({
                'display':'block',
            })
        });
        $('#docuo').click(function(){
            $('.diary_brow').css({
                'display':'none',
            });
        });
        var a;
        var b;
        $('.diary_brow2 ul li').click(function(){
            a ="[["+$(this).attr('ze')+"]]";
            b=$('#myDiv').val();
            a=b+a;
           $('#myDiv').val(a);
           $('.diary_brow').css({
               'display':'none',
           });
        });

//        $('body').click(function(){
//           $('#diary_hidden').val($('#myDiv').html()) ;
////           alert( $('#diary_hidden').val());
//        });
        $(window).resize(function(){
            if($('body').css('margin-left') != 150 ){
                $('.model_main').css({
                    'margin-left':'150px',
                });
                $('body').css({
                    'margin-left':'0',
                });
            }
            if($('body').css('margin-left') == 150 ){
                $('.model_main').css({
                    'padding-left':'0',
                });
                $('body').css({
                    'margin-left':'150px',
                });
            }
        })

        {{--$('#push').click(function () {--}}
            {{--$.ajax({--}}
                {{--url:"{{asset('home/dophoto')}}?_token={{asset(csrf_token())}}",--}}
                {{--type:'post',--}}
                {{--data : $( '#write_from').serialize()+"&content="+$('#myDiv').html(),--}}
                {{--success:function(data){--}}
                    {{--alert(data);--}}
                {{--},--}}
                {{--error:function(data){--}}
                    {{--alert(222111);--}}
                    {{--return false;--}}
                {{--},--}}
{{--//                async: false--}}
            {{--})--}}
        {{--})--}}
    });
</script>
@endsection