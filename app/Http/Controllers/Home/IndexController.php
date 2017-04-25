<?php

namespace App\Http\Controllers\Home;

use App\Home\Friend;
use App\Model\Home\Comment;
use App\Model\home\CommentLikes;
use App\Model\Home\diary;
use App\Model\Home\integrade;
use App\Model\Home\integradeDo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{

    //主页
    public function index()
    {
        $uid=Auth::user()->id;
        $icon=User::find($uid)->avatar;
        $comment=DB::table('diarys')->join('users','diarys.uid','users.id')->where('uid',$uid)->get();
        $con=DB::table('comments')->join('diarys','comments.tid','diarys.id')->join('users','comments.uid','users.id')->get();
//        $comment=diary::where('uid',$uid)->get();
//        dd($cont[4]->content_c);
        $cont = $con->toArray();

        foreach($cont as $k => $v){
               $num =  count(CommentLikes::where('rid', $v->id_c)->get()->toArray());
               $cont[$k]->num=$num;
        }
//       表情
        $preg = array(
              '/\[织\]/',
              '/神马\]/',
              '/\[浮云\]/',
              '/\[给力\]/',
              '/\[围观\]/',
              '/\[威武\]/',
              '/\[熊猫\]/',
              '/兔子\]/',
              '/\[奥特曼\]/',
              '/\[囧\]/',
              '/\[互粉\]/',
              '/\[礼物\]/',
              '/呵呵\]/',
              '/嘻嘻\]/',
              '/\[哈哈\]/',
              '/\[可爱\]/',
              '/\[可怜\]/',
              '/\[挖鼻屎\]/',
              '/\[吃惊\]/',
              '/\[害羞\]/',
              '/\[挤眼\]/',
              '/\[闭嘴\]/',
              '/\[鄙视\]/',
              '/\[爱你\]/',
              '/\[泪\]/',
              '/\[偷笑\]/',
              '/\[亲亲\]/',
              '/\[生病\]/',
              '/\[太开心\]/',
              '/\[懒得理你\]/',
              '/\[右哼哼\]/',
              '/\[左哼哼\]/',
              '/\[嘘\]/',
              '/\[衰\]/',
              '/\[委屈\]/',
              '/\[吐\]/',
              '/\[打哈气\]/',
              '/\[抱抱\]/',
              '/\[怒\]/',
              '/\[疑问\]/',
              '/\[馋嘴\]/',
              '/\[拜拜\]/',
              '/\[思考\]/',
              '/\[汗\]/',
              '/\[困\]/',
              '/\[睡觉\]/',
              '/\[钱\]/',
              '/\[失望\]/',
              '/\[酷\]/',
              '/\[花心\]/',
              '/\[哼\]/',
              '/\[鼓掌\]/',
              '/\[晕\]/',
              '/\[悲伤\]/',
              '/\[抓狂\]/',
              '/\[黑线\]/',
              '/\[阴险\]/',
              '/\[怒骂\]/',
              '/\[心\]/',
              '/\[伤心\]/',
              '/\[猪头\]/',
              '/\[ok\]/',
              '/\[耶\]/',
              '/\[good\]/',
              '/\[不要\]/',
              '/\[赞\]/',
              '/\[来\]/',
              '/\[弱\]/',
              '/\[蜡烛\]/',
              '/\[钟\]/',
              '/\[蛋糕\]/',
              '/\[话筒\]/',
              '/\[围脖\]/',
              '/\[转发\]/',
              '/\[路过这儿\]/',
              '/\[bofu变脸\]/',
              '/\[gbz困\]/',
              '/\[生闷气\]/',
              '/\[不要啊\]/',
              '/\[dx泪奔\]/',
              '/\[运气中\]/',
              '/\[有钱\]/',
              '/\[冲锋\]/',
              '/\[照相机\]/'
        );
        $replace = array(
                '<img src="/home/img/images/zz2_thumb.gif" >',
				'<img src="/home/img/images/horse2_thumb.gif" >',
				'<img src="/home/img/images/fuyun_thumb.gif" >',
				'<img src="/home/img/images/geili_thumb.gif" >',
				'<img src="/home/img/images/wg_thumb.gif" >',
				'<img src="/home/img/images/vw_thumb.gif" >',
			    '<img src="/home/img/images/panda_thumb.gif" >',
				'<img src="/home/img/images/rabbit_thumb.gif" >',
				'<img src="/home/img/images/otm_thumb.gif" >',
				'<img src="/home/img/images/j_thumb.gif" >',
				'<img src="/home/img/images/hufen_thumb.gif" >',
				'<img src="/home/img/images/liwu_thumb.gif" >',
				'<img src="/home/img/images/smilea_thumb.gif" >',
				'<img src="/home/img/images/tootha_thumb.gif" >',
				'<img src="/home/img/images/laugh.gif" >',
				'<img src="/home/img/images/tza_thumb.gif" >',
				'<img src="/home/img/images/kl_thumb.gif" >',
				'<img src="/home/img/images/kbsa_thumb.gif" >',
				'<img src="/home/img/images/cj_thumb.gif" >',
				'<img src="/home/img/images/shamea_thumb.gif" >',
				'<img src="/home/img/images/zy_thumb.gif" >',
				'<img src="/home/img/images/bz_thumb.gif" >',
				'<img src="/home/img/images/bs2_thumb.gif" >',
				'<img src="/home/img/images/lovea_thumb.gif" >',
				'<img src="/home/img/images/sada_thumb.gif" >',
				'<img src="/home/img/images/heia_thumb.gif" >',
				'<img src="/home/img/images/qq_thumb.gif" >',
				'<img src="/home/img/images/sb_thumb.gif" >',
				'<img src="/home/img/images/mb_thumb.gif" >',
				'<img src="/home/img/images/ldln_thumb.gif" >',
				'<img src="/home/img/images/yhh_thumb.gif" >',
				'<img src="/home/img/images/zhh_thumb.gif" >',
				'<img src="/home/img/images/x_thumb.gif" >',
				'<img src="/home/img/images/cry.gif" >',
				'<img src="/home/img/images/wq_thumb.gif" >',
				'<img src="/home/img/images/t_thumb.gif" >',
				'<img src="/home/img/images/k_thumb.gif" >',
				'<img src="/home/img/images/bba_thumb.gif" >',
				'<img src="/home/img/images/angrya_thumb.gif" >',
				'<img src="/home/img/images/yw_thumb.gif" >',
				'<img src="/home/img/images/cza_thumb.gif" >',
				'<img src="/home/img/images/88_thumb.gif" >',
				'<img src="/home/img/images/sk_thumb.gif" >',
				'<img src="/home/img/images/sweata_thumb.gif" >',
				'<img src="/home/img/images/sleepya_thumb.gif" >',
				'<img src="/home/img/images/sleepa_thumb.gif" >',
				'<img src="/home/img/images/money_thumb.gif" >',
				'<img src="/home/img/images/sw_thumb.gif" >',
				'<img src="/home/img/images/cool_thumb.gif" >',
				'<img src="/home/img/images/hsa_thumb.gif" >',
				'<img src="/home/img/images/hatea_thumb.gif" >',
				'<img src="/home/img/images/gza_thumb.gif" >',
				'<img src="/home/img/images/dizzya_thumb.gif" >',
				'<img src="/home/img/images/bs_thumb.gif" >',
				'<img src="/home/img/images/crazya_thumb.gif" >',
				'<img src="/home/img/images/h_thumb.gif" >',
				'<img src="/home/img/images/yx_thumb.gif" >',
				'<img src="/home/img/images/nm_thumb.gif" >',
				'<img src="/home/img/images/hearta_thumb.gif" >',
				'<img src="/home/img/images/unheart.gif" >',
				'<img src="/home/img/images/pig.gif" >',
				'<img src="/home/img/images/ok_thumb.gif" >',
				'<img src="/home/img/images/ye_thumb.gif" >',
				'<img src="/home/img/images/good_thumb.gif" >',
				'<img src="/home/img/images/no_thumb.gif" >',
				'<img src="/home/img/images/z2_thumb.gif" >',
				'<img src="/home/img/images/come_thumb.gif" >',
				'<img src="/home/img/images/sad_thumb.gif" >',
				'<img src="/home/img/images/lazu_thumb.gif" >',
				'<img src="/home/img/images/clock_thumb.gif" >',
				'<img src="/home/img/images/cake.gif" >',
				'<img src="/home/img/images/m_thumb.gif" >',
				'<img src="/home/img/images/weijin_thumb.gif" >',
				'<img src="/home/img/images/lxhzhuanfa_thumb.gif" >',
				'<img src="/home/img/images/lxhluguo_thumb.gif" >',
				'<img src="/home/img/images/bofubianlian_thumb.gif" >',
				'<img src="/home/img/images/gbzkun_thumb.gif" >',
				'<img src="/home/img/images/boboshengmenqi_thumb.gif" >',
				'<img src="/home/img/images/chn_buyaoya_thumb.gif" >',
				'<img src="/home/img/images/daxiongleibenxiong_thumb.gif" >',
				'<img src="/home/img/images/cat_yunqizhong_thumb.gif" >',
				'<img src="/home/img/images/youqian_thumb.gif" >',
				'<img src="/home/img/images/cf_thumb.gif" >',
				'<img src="/home/img/images/camera_thumb.gif" >'
        );
        foreach ($cont as $k => $v) {
           $v->content_c = preg_replace($preg, $replace, $v->content_c);
        }
//        dd($cont);
//        dd($faceImg);
//        根据用户的id查找出好友的id 用 orwhere 查出好友的comment遍历出来；
//======================================================================================
//        积分判断
//        $uid=Auth::user()->id;
        $result=integrade::where('uid',$uid)->get();
        if(count($result) == 0){
            $data=array(
                'uid'=>$uid,
            );
            $eid=DB::table('integrade')->insertGetId($data);
            $jf=integradeDo::create([
                'eid'=>$eid,
                'time_d'=>date('Y/m/d',time()),
                'time_m'=>date('h:i:s',time()),
            ]);
        }else{
            $eid=$result[0]->id_e;
            $jf=integradeDo::where('eid',$eid)->get()[0];
            $t=strtotime(date('Y/m/d',time()))-strtotime($jf->time_d);
            if(abs($t) >= 86400) {
                $result[0]->rp_z += $result[0]->rp_d;
                $result[0]->rp_d=0;
                $result[0]->save();
                $jf->time_d=date('Y/m/d',time());
                $jf->rp_f=0;
                $jf->save();
            }
            $sub=strtotime(date('h:i:s',time())) - strtotime($jf->time_m);
            if(abs($sub) > 1800)
            {
                $jf->rp_f += 1;
                $result[0]->rp_d += 1;
                $result[0]->save();
                $jf->time_m=date('h:i:s',time());
                $jf->save();
            }
        }
        $rpd=$result[0]->rp_d;
        $rpz=$result[0]->rp_z;
        $rpf=$jf->rp_f;
        $untime=1800-$sub;
        $sub=date('i分:s秒',$untime);
//        遍历可能认识的人
//        学校 地址
//        生日提醒
        $friends=Friend::where('user1id',$uid)->where('status',3)->get()->toarray();
        if(count($friends) > 0) {
            foreach ($friends as $va) {
                $fuid[] = $va['user2id'];
            }

            $userfriend = User::find($fuid)->toarray();
            $str = implode("','", $fuid);
            $ufriend = DB::select("select id,name,avatar,birthday from users where date_format(birthday,'%m%d') between date_format(curdate()-interval 7 day,'%m%d') and
        date_format(curdate()+interval 7 day,'%m%d') and id in ('$str') limit 0,7 ");
//        dd($ufriend);
        }
//-------------------------------------------------------------------------------------

        return view('home.index',compact('friends','comment','icon','cont','faceImg','rpd','rpz','rpf','sub','friends','ufriend','uid'));
    }
    //登录
    public function login()
    {
        return view('home.login');
    }
    //照片集
    public function photo()
    {
        return view('home.photo');
    }
    //写日志
    public function writediary()
    {
        return view('home.writediary');
    }
    //日志
    public function diary()
    {
        return view('home.diary');
    }
    //把日志写进数据库
    public function dophoto(Request $request)
    {
        dd($request->all());
        //接收前台传过来的数据
        $token=$request->input('_token');
        $title=$request->input('title');
        $content=$request->input('content');
        $id=$request->input('id');
        $utime=time();
        $url=$id.'_'.$utime;
        $photoname='';
        $a=1;
        if($request->pic){
            foreach($request->file('pic') as $file) {
                $lastname = substr($_FILES['pic']['name'][0], strrpos($_FILES['pic']['name'][0], '.'), 5);
                $file->move('img/'.$url, $a .$lastname);
                $a++;
            }
        }
//        if($request->pic){
//            $lastname=substr ($_FILES['pic']['name'],strrpos ($_FILES['pic']['name'],'.'),5 );
//            $photoname=str_random(11).$lastname;
//            $request->pic->move('img',$photoname);
//        }
//        dd(($request->file('pic')));
        if(DB::table('diarys')->where('uid',$id)->where('title',$title)->where('content',$content)){
            echo "你已经在发表过这篇文章了";
            return;
        }
        $arr=array(
            'uid'=>$id,
            'title'=>$title,
            'content'=>$content,
            'likenum'=>0,
            'cstate'=>0,
            'utime'=>$utime,
            'photoname'=>$photoname,
            'remember_token'=>$token
        );
        DB::table('diarys')->insert($arr);
    }

    //个人中心
    public function center(){
        return view('home.myself');
    }

    //天气
    public function date()
    {
        return view('/port/weather');
    }
    //新闻
    public function news()
    {
        return view('/port/news');
    }
}
