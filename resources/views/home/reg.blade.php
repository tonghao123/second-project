<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/reg.css')}}">
    <title>Document</title>
</head>
<body>
<div id="header">
    <div class="header_nav">
        <div id="logo"><img src="{{asset('home/img/logo.jpg')}}" alt="人人网"></div>
        <div class="nav-other">

            <div class="menu">
                <span class="right">已有人人帐号，<a href="http://hui.dev/home/login">登录</a> </span>
            </div>
        </div>
    </div>
</div>

<div class="reg">
    <div class="register">
        <div class="header">注册新帐号 加入人人网</div>
        @if(count($errors) > 0)
            <div class="alert alert-danger" style="width:520px;!important;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="/store">
            {{csrf_field()}}
            <div class="form_wrap">
                用&nbsp户&nbsp&nbsp名:&nbsp&nbsp&nbsp<input type="text" name="name" id="name" class="forminput"><br><br>
                邮&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp箱:&nbsp&nbsp&nbsp<input type="email" name="email" id="email" class="forminput"><br><br>
                密&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp码:&nbsp&nbsp&nbsp<input type="password" name="password" id="password" class="forminput" placeholder="密码由6-20个字符组成"><br><br>
                重复密码:&nbsp&nbsp&nbsp<input type="password" name="password_confirmation" id="password_confirmation" maxlength="20" class="forminput"><br><br>
                <input type="submit" class="btn btn-success" id="btn" style="width:421px;!important;">
            </div>
        </form>

</div>
</div>

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
        <p class="copyright-info" >
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
</body>
</html>