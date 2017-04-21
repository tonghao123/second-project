<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('public/css/bootstrap.css')}}"  rel="stylesheet">
    <link href="{{asset('admin/css/adminmodel.css')}}"  rel="stylesheet">
    <title>Document</title>
</head>
<body>
<!--------------------------  导航栏开始  ---------------------->

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Will Be Better</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 0.8px;">
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" placeholder="搜索的内容" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">搜索</button>
            </form>
            <ul class="nav navbar-nav navbar-right top_ul" style="">
                <li><img src="{{asset('home/img/default_icon.png')}}" alt="龙少" style="height:40px;margin-right:10px;border-radius:100%"> </li>
                <li>欢迎</li>
                {{--<li><a href="" style="padding:10px;"><img src="{{asset('home/img/default_icon.png')}}" height="30" style=""></a></li>--}}
                <li><a href="" style="color:#fff">龙家大少</a></li>
                <li>登录后台</li>
                <li><a href="" style="color:#fff;">退出</a></li>
                {{--<li style="cursor:default"><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;</a></li>--}}
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<!--------------------------  导航栏结束  ---------------------->

<!--------------------------  左边的开始  ---------------------->

<div class="amodel_left" >
    <ul>
        <li class="amodel_fli">
            <span>前台管理</span>
            <ul>
                <a href=""><li>角色管理</li></a>
                <a href=""><li>权限管理</li></a>
                <a href=""><li>管理员管理</li></a>
            </ul>
        </li>
        <li class="amodel_fli"><span>后台管理</span></li>
    </ul>

</div>

<!--------------------------  左边的结束  ---------------------->
<!--------------------------  主体的开始  ---------------------->

<div class="amodel_main">
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="">首页</a> &nbsp;>>&nbsp; <a href="">xx管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href=""><span class="glyphicon glyphicon-plus"></span>新增xx</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span> <a href=""><span class="glyphicon glyphicon-trash"></span>批量删除</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span> <a href=""><span class="glyphicon glyphicon-refresh"></span>更新排序</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="amodel_maintablef">
        <table class="table table-hover table-striped">
            <tr>
                <th>asdsad</th>
                <th>asdsad</th>
                <th>asdsad</th>
                <th>asdsad</th>
            </tr>
            <tr>
                <td>111</td>
                <td>sadsa222d</td>
                <td>sadsa222d</td>
                <td>sadsa222d</td>
            </tr>
            <tr>
                <td>111</td>
                <td>sadsa222d</td>
                <td>sadsa222d</td>
                <td>sadsa222d</td>
            </tr>
        </table>
    </div>
</div>

<!--------------------------  主体的结束  ---------------------->



<!-- **************************** jquery开始到最后 ********************************* -->
<script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(function(){
        $(".amodel_fli span").dblclick(function(){
            return false;
        })
        $(".amodel_fli span").click(function(){
            $(this).siblings('ul').slideToggle('fast');
        });

    })
</script>
</body>
</html>