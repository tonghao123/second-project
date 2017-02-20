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

        <div class="photo_photos">
            @if(count($arr) > 0)
                @foreach($arr as $ar)
                    <div class="photo_photo">
                        <div class="photo_img">
                            <a href=""><img src="{{ asset($ar['savepath'].'/'.$ar['pho_name'])  }}" width="230" height="160"></a>
                                                        {{--<a href=""><img src="{{asset('home/img/4.jpg')}}" width="230" height="160"></a>--}}
                        </div>
                        <div class="photo_from">
                            <a href="">{{$ar['pname']}}</a>
                            <a href="{{asset('/home/delphos/'.$ar['id'])}}" style="text-align: center;">删除</a>
                            <span>{{$ar['status']==1?'公开':'不公开'}}</span>
                        </div>
                    </div>
                @endforeach
            @endif



        </div>

    </div>
    <div class="mybody">
    </div>
    <div class="diary_brow" >
        <div class="diary_brow1">
            <span class="diary_brow1span"><b>新建相册</b></span>
            <span class="glyphicon glyphicon-remove" id="docuo" style="float:right;margin-right:15px;line-height:30px;"></span>
        </div>

        <div class="diary_brow2">
            <form action="/home/doalbum" method="post">
                {{csrf_field()}}
                相册名:<input type="text" name="pname" id="album_namea"><br>
                状&nbsp;&nbsp;&nbsp;&nbsp;态:
                <select name="status" id="album_name">
                    <option value="1">公开</option>
                    <option value="2">不公开</option>
                </select><br>
                <input type="hidden" name="uid" id="uid" value="{{Auth::user()->id}}">
                <input type="submit" id="doalbum" class="btn btn-info" value="添加">
            </form>
        </div>
    </div>
@endsection
@section('my_js')
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <script>
        $(function(){
            $('#newp').click(function(){
                $('.mybody').css({
                    'display':'block'
                });
                $('.diary_brow').css({
                    'display':'block'
                });
            });
            $('#docuo').click(function(){
                $('.mybody').css({
                    'display':'none'
                });
                $('.diary_brow').css({
                    'display':'none'
                });
            });
        })
    </script>
@endsection


























