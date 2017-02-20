<?php

namespace App\Http\Controllers\Home;

use App\Home\Album;
use App\Home\Diary;
use App\Home\Friend;
use App\Home\Photo;
use App\Model\Home\Information;
use App\Model\Home\Lamp;
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
        return view('home.index');
    }
    //登录
    public function login()
    {
        return view('home.login');
    }
    //照片集
    public function photo()
    {
        $id=Auth::user()->id;
        $arr=Album::all()->where('uid',$id)->toArray();
        $arr=array_merge($arr);
        $spaths=Album::where('uid',$id)->pluck('id')->toArray();
        $count=count($spaths);
        foreach ($spaths as $k=> $spath){
            $spathes=Photo::select('pho_name','savepath')->where('aid',$spath)->limit(1)->get()->toArray();
            if(count($spathes)){
                $spathe[]=$spathes[0];
            }else{
                $spathes=array(
                    "pho_name" => "default_icon.png",
                    "savepath" => "home/img"
                );
                $spathe[]=$spathes;
            }
        }
        for($i=0;$i<$count;$i++){
            $s[$i]=array_merge($arr[$i],$spathe[$i]);
        }
        return view('home.photo')->with('arr',$s);
    }
    //写日志
    public function writediary()
    {
        return view('home.writediary');
    }
    //日志
    public function diary()
    {
        $uid=Auth::user()->id;
        $result=Diary::all()->where('uid',$uid)->toArray();
        return view('home.diary')->with('arr',$result);
    }
    //把日志写进数据库
    public function dophoto(Request $request)
    {
        //接收前台传过来的数据
        $token=$request->input('_token'); //token
        $title=$request->input('title');  //题目
        $content=$request->input('content'); //文章
        $id=$request->input('id'); //用户id
        $utime=time();              //创建时间
        $url=$id.'_'.$utime;        //保存路径
        $cstate=$request->input('cstate');//1公开2不公开
        $photoname='';
        if($title=="" || $content==""){
            return view('/home/writediary')->withErrors('题目或者内容不能为空');
        }
        $a=1;
        //如果有图片就保存
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
        if(DB::table('diarys')->where('uid',$id)->where('title',$title)->where('content',$content)->first()){
            return view('/home/writediary')->withErrors('你应经发表过这篇日志了');
        }
        $arr=array(
            'uid'=>$id,
            'title'=>$title,
            'content'=>$content,
            'likenum'=>0,
            'cstate'=>0,
            'utime'=>$utime,
            'photoname'=>$photoname,
            'cstate'=>$cstate,
            'remember_token'=>$token
        );
        if(DB::table('diarys')->insert($arr)){
            return view('/home/writediary')->withErrors('发表成功');
        }else{
            return view('/home/writediary')->withErrors('发表失败');
        }

    }

    //个人中心
    public function center(){
        return view('home.myself');
    }

    public function doalbum(Request $request)
    {
        $aa=$request->all();
        $name=$aa['pname'];
        $uid=$aa['uid'];
        //yiyiyi
        $id=Auth::user()->id;
        $arr=Album::all()->where('uid',$id)->toArray();
        $arr=array_merge($arr);
        $spaths=Album::where('uid',$id)->pluck('id')->toArray();
        $count=count($spaths);
        foreach ($spaths as $k=> $spath){
            $spathes=Photo::select('pho_name','savepath')->where('aid',$spath)->limit(1)->get()->toArray();
            if(count($spathes)){
                $spathe[]=$spathes[0];
            }else{
                $spathes=array(
                    "pho_name" => "default_icon.png",
                    "savepath" => "home/img"
                );
                $spathe[]=$spathes;
            }
        }
        for($i=0;$i<$count;$i++){
            $s[$i]=array_merge($arr[$i],$spathe[$i]);
        }
        //yiyiyi
        //判断有没有原来的数据 有的话就返回原来的网页
        if(count(Album::all()->where('pname',$name)->where('uid',$uid)) || $name==null){
            return view('home.photo')->with('arr',$s);
        }

        $bb=array_shift($aa);
        $time=array(
            'time'=>time(),
        );
        $aa=array_merge($aa,$time);
        Album::insert($aa);

        //ererer
        $id=Auth::user()->id;
        $arr=Album::all()->where('uid',$id)->toArray();
        $arr=array_merge($arr);
        $spaths=Album::where('uid',$id)->pluck('id')->toArray();
        $count=count($spaths);
        foreach ($spaths as $k=> $spath){
            $spathes=Photo::select('pho_name','savepath')->where('aid',$spath)->limit(1)->get()->toArray();
            if(count($spathes)){
                $spathe[]=$spathes[0];
            }else{
                $spathes=array(
                    "pho_name" => "default_icon.png",
                    "savepath" => "home/img"
                );
                $spathe[]=$spathes;
            }
        }
        for($i=0;$i<$count;$i++){
            $s[$i]=array_merge($arr[$i],$spathe[$i]);
        }
        //ererere
        $s[$count-1]["pho_name"]="default_icon.png";
        $s[$count-1]["savepath"]="home/img";

//        dd($s);
        return view('home.photo')->with('arr',$s);
    }

    public function upphoto(Request $request)
    {
//        dd($request->all());
        $array=$request->all();
        $aid=$array['myphoto'];
        $time=time();
        $a=array(
            'aid'=>$aid,
            'time'=>$time
        );
        $id=Auth::user()->id;
        $arr=Album::all()->where('uid',$id)->toArray();
        //循环遍历图片路径
        $spath=Album::where('uid',$id)->pluck('id')->toArray();
        foreach ($spath as $spa){
            $spaths[]=Photo::where('aid',$spa)->first();

        }
//        dd($arr->toArray());
        $arr=array_merge($arr,$spaths);
        if( ! $request->pic){
            return view('home/photo')->with('arr',$arr);
        }
        $aass=Album::find($aid);
        $uid=$aass['uid'];
        $pname=$aass['pname'];
        //存放路径 img/xxx_Xxx
        $str=$uid.'_'.$pname;
        foreach($request->file('pic') as $file) {
            $lastname = substr($_FILES['pic']['name'][0], strrpos($_FILES['pic']['name'][0], '.'), 5);
            $e=str_random(10);
            $e=$e.$lastname;
            $savepath='img/'.$str;
            $file->move($savepath ,$e);
            $ae=array_merge($a,['pho_name'=>$e,'savepath'=>$savepath]);
            Photo::insert($ae);
            $a++;
        }
        //yiyiyi查出数据 并合并 最后返回页面
        $id=Auth::user()->id;
        $arr=Album::all()->where('uid',$id)->toArray();
        $arr=array_merge($arr);
        $spaths=Album::where('uid',$id)->pluck('id')->toArray();
        $count=count($spaths);
        foreach ($spaths as $k=> $spath){
            $spathes=Photo::select('pho_name','savepath')->where('aid',$spath)->limit(1)->get()->toArray();
            if(count($spathes)){
                $spathe[]=$spathes[0];
            }else{
                $spathes=array(
                    "pho_name" => "default_icon.png",
                    "savepath" => "home/img"
                );
                $spathe[]=$spathes;
            }
        }
        for($i=0;$i<$count;$i++){
            $s[$i]=array_merge($arr[$i],$spathe[$i]);
        }
        //yiyiyi
        return view('/home/photo')->with('arr',$s);
    }
    public function delpho($id)
    {
       //yiyiyi
        $uid=Auth::user()->id;
        $arr=Album::all()->where('uid',$uid)->toArray();
        $arr=array_merge($arr);
        $spaths=Album::where('uid',$uid)->pluck('id')->toArray();
        $count=count($spaths);
        foreach ($spaths as $k=> $spath){
            $spathes=Photo::select('pho_name','savepath')->where('aid',$spath)->limit(1)->get()->toArray();
            if(count($spathes)){
                $spathe[]=$spathes[0];
            }else{
                $spathes=array(
                    "pho_name" => "default_icon.png",
                    "savepath" => "home/img"
                );
                $spathe[]=$spathes;
            }
        }
        for($i=0;$i<$count;$i++){
            $s[$i]=array_merge($arr[$i],$spathe[$i]);
        }
       //yiyiyi

        if(! $id){
            return view('/home/photo')->with('arr',$s);
        }
        //相册名
        $pname=Album::select('pname')->where('id',$id)->get();
        $result=Photo::where('aid',$id)->get()->toArray();
        if($result){
            foreach ($result as $r) {
                if (file_exists($r['savepath'] . '/' . $r['pho_name'])){
                    unlink($r['savepath'] . '/' . $r['pho_name']);
                }
            }
        }
        $pname=$pname[0]['pname'];
        if (file_exists('img/'.$uid.'_'.$pname)){
            rmdir('img/'.$uid.'_'.$pname);
        }

        //删除相册中的数据
        Album::where('id',$id)->delete();
        //删除图片中的数据
        Photo::where('aid',$id)->delete();
        //yiyiyi
        $uid=Auth::user()->id;
        $arr=Album::all()->where('uid',$uid)->toArray();
        $arr=array_merge($arr);
        $spaths=Album::where('uid',$uid)->pluck('id')->toArray();
        $count=count($spaths);
        foreach ($spaths as $k=> $spath){
            $spathes=Photo::select('pho_name','savepath')->where('aid',$spath)->limit(1)->get()->toArray();
            if(count($spathes)){
                $spathe[]=$spathes[0];
            }else{
                $spathes=array(
                    "pho_name" => "default_icon.png",
                    "savepath" => "home/img"
                );
                $spathe[]=$spathes;
            }
        }
        $s=array();
        for($i=0;$i<$count;$i++){
            $s[$i]=array_merge($arr[$i],$spathe[$i]);
        }
        //yiyiyi
        return view('/home/photo')->with('arr',$s);
    }

    public function photos($id)
    {
        $aid=$id;
        $result=Photo::select()->where('aid',$aid)->get();
        return view('home/photos')->with('arr',$result);
    }
    public function delphos($id)
    {
        $result=Photo::where('id',$id)->first();
        if($result){
            if(file_exists($result['savepath'].'/'.$result['pho_name'])){
                unlink($result['savepath'].'/'.$result['pho_name']);
            }
        }
        Photo::where('id',$id)->delete();
        return back();
    }
    //更新日志页
    public function updatediary($id)
    {
//        dd($id);
        if(! $id){
            $uid=Auth::user()->id;
            $result=Diary::all()->where('uid',$uid)->toArray();
            return view('/home/diary')->with('arr',$result)->withErrors('id值不能为空');
//            return back()->withErrors('id值不能为空');
        }
        $result=Diary::where('id',$id)->get()->toArray();
        $result=$result[0];
        if(empty($result)){
            return back()->withErrors('此文章可能不存在,请稍后再修改');
        }
        return view('home.updatediary')->with('arr',$result);
    }

    //处理更新日志
    public function doupdiary(Request $request)
    {
        $result=$request->all();
        //去掉token
        array_pop($result);
        //最后一个是id
        $id=array_pop($result);
        $r=Diary::where('id',$id)->get()->toArray();
        $r=$r[0];
        //判断跟原来的内容一致就返回
        if($result['title']==$r['title'] && $result['content']==$r['content'] && $result['cstate']==$r['cstate'] )
        {
            $result=Diary::where('id',$id)->get()->toArray();
            $result=$result[0];
            if(empty($result)){
                return back()->withErrors('此文章可能不存在,请稍后再修改');
            }
            return view('/home/updatediary')->with('arr',$result)->withErrors('请修改信息');
        }

        if(Diary::where('id',$id)->update($result)){
            $uid=Auth::user()->id;
            $result=Diary::all()->where('uid',$uid)->toArray();
            return view('/home/diary')->with('arr',$result)->withErrors('修改成功');
        }else{
            $result=Diary::where('id',$id)->get()->toArray();
            $result=$result[0];
            if(empty($result)){
                return back()->withErrors('此文章可能不存在,请稍后再修改');
            }
            return view('/home/updatediary')->with('arr',$result)->withErrors('修改失败,请稍后再试');
        }

    }

    //删除日志
    public function deldiary($id)
    {
        $time=Diary::select('utime')->where('id',$id)->get();
        $time=$time[0]['utime'];

        if(! $id){
            $uid=Auth::user()->id;
            $result=Diary::all()->where('uid',$uid)->toArray();
            return view('/home/diary')->with('arr',$result)->withErrors('id值不能为空');
        }
        if(Diary::where('id',$id)->delete()){
            $uid=Auth::user()->id;
            $path='img/'.$uid.'_'.$time;
            $fh = opendir($path);
            while(($row = readdir($fh)) !== false){
                //过滤掉虚拟目录
                if($row == '.' || $row == '..'){
                    continue;
                }

                if(!is_dir($path.'/'.$row)){
                    unlink($path.'/'.$row);
                }

            }
            closedir($fh);
            rmdir($path);


            $result=Diary::all()->where('uid',$uid)->toArray();
            return view('/home/diary')->with('arr',$result)->withErrors('删除成功');
        }

    }


    //好友页
    public function friends()
    {
        $id=Auth::user()->id;
        $result=Friend::select('user1id','user2id')->where('status',3)->where('user1id',$id)->orwhere('user2id',$id)->where('status',3)->get()->toArray();
        $userinfo=[];
        //把查出来的数据id去查用户信息 储存在一个数组中 然后传到friends
        foreach($result as $r){
            if($r['user1id'] != $id ){
                $userinfo[]=User::where('id',$r['user1id'])->get()->toArray()[0];
            }
            if($r['user2id'] != $id ){
                $userinfo[]=User::where('id',$r['user2id'])->get()->toArray()[0];
            }
        }
        return view('/home/friends')->with('arr',$userinfo);
    }
    //删除我的好友
    public function delfriends($id)
    {
        $myid=Auth::user()->id;
//        dd($id);
        $result=Friend::where('user1id',$id)->where('user2id',$myid)->orwhere('user2id',$id)->where('user1id',$myid)->delete();
        return redirect('home/friends');
    }

    //显示我关注的好友
    public function myfriends()
    {
        $id=Auth::user()->id;
        $result=Friend::where('user1id',$id)->where('status',1)->orderBy('user2id','asc')->get()->toArray();

        $useridinfo=[];
        foreach($result as $user2 ){
            $useridinfo[]=$user2['user2id'];
        }
        $r=User::whereIn('id',$useridinfo)->get()->toArray();
        return view('home/myfriends')->with('arr',$r);
    }
    //删除我关注的好友
    public function delmyfriends($id)
    {
        $myid=Auth::user()->id;
        $result=Friend::select('id')->where('user1id',$myid)->where('user2id',$id)->where('status','1')->get()->toArray();
        if($result != []){
            $fid=$result[0]['id'];
            $r=Friend::where('id',$fid)->delete();
            if($r){
                return back()->withErrors('取关成功');
            }
            return back()->withErrors('删除失败,稍后再试');
        }
        return back()->withErrors('目前你没有关注该好友');

    }
    //显示关注我的好友
    public function friendsmy()
    {
        $myid=Auth::user()->id;
        $result=Friend::where('user2id',$myid)->where('status',1)->orderBy('user1id','asc')->get()->toArray();
//        dd($result);
        $userinfo=[];
        foreach ($result as $v){
            $userinfo[]=$v['user1id'];
        }
//        dd($userinfo);
        $r=User::whereIn('id',$userinfo)->get()->toArray();
        return view('home/friendsmy')->with('arr',$r);
    }
    //显示查询
    public function addfriends()
    {
        return view('home/addfriends');
    }
    //显示查询好友页
    public function searchfriends(Request $request)
    {
        if($request->all()==[]){
            return redirect('home/addfriends');
        }
        $name=$request->all()['name'];

        if((preg_match_all("/[^\s　]+/s",$name))!=1 || $name=="" ){
            $arr='';
            return view('home/searchfriends')->with('result',$arr)->withErrors('请输入正确的内容');
        }

        //查出id并取消当前用户id
        $id=Auth::user()->id;
        //清除name的两边的值
        $name=trim($name," ");
        //判断name有无值
        if($name){
            $result=User::where('username','like','%'.$name.'%')->where('id','<>',$id)->get()->toArray();
        }else{
            $result="";
        }
        //查不出数据就烦返回无数据
        if($result==[]){
            return view('home/searchfriends')->with('result',$result)->withErrors('无此数据');
        }else{

            return view('home/searchfriends',compact('result'));
        }
    }
    //关注好友
    public function doattention($id)
    {
        //用户1的ID
        $myid=Auth::user()->id;
        //用户2的ID
        $user2id=$id;
        //查询有没有关注和被关注
        $result=Friend::select('status')->where('user1id',$myid)->where('user2id',$user2id)->get()->toArray();
        $result1=Friend::select('status')->where('user2id',$myid)->where('user1id',$user2id)->get()->toArray();
//        dd($result1);
        //如果都没有则添加关系
        if($result==[] && $result1==[] ){
            $arr=array(
                'user1id'=>$myid,
                'user2id'=>$user2id,
                'status'=>1
            );
            if(Friend::insert($arr)){
                  redirect('home/myfriends')->withErrors('关注成功');
            }
            //我关注别人,我再点跳到我的好友页
        }elseif($result1==[] && $result[0]['status']==1){
            return redirect('home/friends')->withErrors('此用户已被关注');
            //别人关注我,我点关注就是好友
        }elseif($result==[] && $result1[0]['status']==1){
            //更新数据
            $re=Friend::where('user2id',$myid)->where('user1id',$user2id)->get();
            $id=$re[0]->id;
            $user=Friend::find($id);
            $user->status=3;
            $u=$user->save();
            return redirect('home/friends')->withErrors('你们成为了好友');
        }
        return redirect('home/friends');
    }

    //显示个人主页
    public function myindex()
    {
        return view('home.myindex');
    }
    //显示个人资料页
    public function information()
    {
        $user = User::find(Auth::user()->id);
        $information = Information::where('uid',Auth::user()->id)->get();
        $work = Information::where('uid',Auth::user()->id)->get();
        $like = Information::where('uid',Auth::user()->id)->get();
        return view('home.information',compact('user','information','work','like'));
    }
    //四级联动
    public function four($upid=0)
    {
        if($_GET['upid']){
            $upid=$_GET['upid'];
        }else{
            $upid=0;
        }
//        $upid = empty($_GET['upid'])?0:$_GET['upid'];
        $data = Lamp::where('upid',$upid)->get();
//        echo json_encode($data);
        return $data;
    }

    //修改个人信息
    public function doinformation(Request $request)
    {
       $personal = User::find(Auth::user()->id);
       $icon = User::where('id',Auth::user()->id)->get()->toArray();
       $icons = $icon[0]['avatar'];
       $personal->username = $request->input('username','');
       $personal->sex = $request->input('sex','');
        $prov = Lamp::select('name')->where('id',$request->input('prov'))->get()->toArray();
        $city = Lamp::select('name')->where('id',$request->input('city'))->get()->toArray();
        $area = Lamp::select('name')->where('id',$request->input('area'))->get()->toArray();
        $street = Lamp::select('name')->where('id',$request->input('street'))->get()->toArray();
       if (!empty($prov)){
           $prov = $prov[0]['name'];
           $personal->prov = $prov;
           $city = $city[0]['name'];
           $personal->city = $city;
           $area = $area[0]['name'];
           $personal->area = $area;
           $street = $street[0]['name'];
           $personal->street = $street;
       }
       $personal->birthday = $request->input('birthday','');
       if ($request->hasFile('pic')){
           $iconname = md5(time()).'jpg';
           $request->file('pic')->move('img/home',$iconname);
           $personal->avatar = $iconname;
           if ( !($personal->avatar == 'Home/img/default.jpg')){
               if(file_exists('img/home/'.$icons)){
                   unlink('img/home/'.$icons);
               }
           }
       }
       $result = $personal->save();
       //判断是否修改成功
        if ($result){
            return redirect('home/information');
        }else{
            return back();
        }
    }


    //修改学校信息
    public function doschool(Request $request)
    {
        $uid = Information::where('uid',Auth::user()->id)->get()->toArray();
        if (empty($uid)){
            $school = new Information();
            $school->uid = Auth::user()->id;
            $school->school = $request->input('school');
            $school->identity = $request->input('identity');
            $school->counts = $request->input('counts');
            $result = $school->save();
        }else{
            $id = Information::where('uid',Auth::user()->id)->get()->toArray();
            $school = Information::find($id[0]['uid']);
            $school->school = $request->input('school','');
            $school->identity = $request->input('identity','');
            $school->counts = $request->input('counts','');
            $result = $school->save();
        }

        if ($result){
            return redirect('home/information');
        }else{
            return back();
        }
    }

    //修改公司信息
    public function dowork(Request $request)
    {
        $uid = Information::where('uid',Auth::user()->id)->get()->toArray();
        if (empty($uid)){
            $work = new Information();
            $work->uid = Auth::user()->id;
            $work->company = $request->input('company');
            $work->indutry = $request->input('indutry');
            $work->position = $request->input('position');
            $result = $work->save();
        }else {
            $id = Information::where('uid', Auth::user()->id)->get()->toArray();
            $work = Information::find($id[0]['uid']);
            $work->company = $request->input('company', '');
            $work->indutry = $request->input('indutry', '');
            $work->position = $request->input('position', '');
            $result = $work->save();
        }
        if ($result){
            return redirect('home/information');
        }else{
            return back();
        }
    }

    //修改喜欢的信息
    public function dolike(Request $request)
    {
        $uid = Information::where('uid',Auth::user()->id)->get()->toArray();
        if (empty($uid)){
            $like = new Information();
            $like->uid = Auth::user()->id;
            $like->music = $request->input('music');
            $like->book = $request->input('book');
            $like->movie = $request->input('movie');
            $like->game = $request->input('game');
            $result = $like->save();
        }else {
            $id = Information::where('uid', Auth::user()->id)->get()->toArray();
            $like = Information::find($id[0]['uid']);
            $like->music = $request->input('music', '');
            $like->book = $request->input('book', '');
            $like->movie = $request->input('movie', '');
            $like->game = $request->input('game','');
            $result = $like->save();
        }
        if ($result){
            return redirect('home/information');
        }else{
            return back();
        }
    }



}
