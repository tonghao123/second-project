<?php

namespace App\Http\Controllers\Admin;

use App\Home\Album;
use App\Home\Photo;
use App\Http\Requests\UserRegisterRequest;
use App\Model\Home\Information;
use App\Model\Home\Lamp;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    // public function index(){
    //     return view('model.adminmodel');
    // }

    public function login()
    {
        return view('admin.login');
    }
    //登录
//    public function dologin()
//    {
//
//    }
    //后台图片的管理
    public function album()
    {
        $album=Album::orderBy('id','asc')->paginate(2);

        return view('admin\album')->with('album',$album);
    }
    //添加相册
    public function albumadd()
    {
        return view('admin.albumadd');
    }
    //处理添加相册
    public function doalbumadd(Request $request)
    {
        $r=$request->all();
        //判断用户有无数据上传
        if($r['uid']=='' || $r['pname']=='' ){
            return back()->withErrors('请输入数据');
        }
        $uid=$r['uid'];
        $pname=$r['pname'];
        if(preg_match("/^[1-9]+$/",$uid)!=1){
            return back()->withErrors('请输入正确的用户id');
        }
        if(! User::find($uid)){
            return back()->withErrors('此用户不存在');
        }
        $result=Album::where('uid',$uid)->get()->toArray();
        foreach($result as $v){
            if($pname==$v['pname']){
                return back()->withErrors('此相册已存在');
            }
        }
        //去掉token
        array_pop($r);
        $time=time();
        $r=array_merge($r,['time'=>$time]);
        if(Album::insert($r)){
            return back()->withErrors('添加相册成功');
        }
        return back();
    }
    //删除相册
    public function doalbumdel($id)
    {
        if(! Album::find($id))
        {
            return back()->withErrors('此相册已被删除');
        }
        $r=Album::where('id',$id)->delete();
        if($r){
            return back()->withErrors('此相册已被删除');
        }
        return back();
    }

    //更新相册表
    public function albumup(Request $request,$id)
    {
        if($request->all()){
            $r=$request->all();//拿出传过来的数据
            array_pop($r);//去掉token
            $result=Album::find($id);

            $result->uid=$r['uid'];
            $result->pname=$r['pname'];
            $result->status=$r['status'];
            $save=$result->save();

            if($save){
                return back()->withErrors('更新成功');
            }else{
                return back()->withErrors('更新失败');
            }
        }else{
            $r=Album::where('id',$id)->get()->toArray()[0];
            return view('admin/albumup')->with('arr',$r);
        }

    }
    //查看相册表
    public function albumlook($id)
    {
       $r=Photo::where('aid',$id)->get()->toArray();
       dd($r);
    }




    public function index()
    {
        return view('admin.index');
    }
    //显示用户信息
    public function lists()
    {
        $result = DB::table('users')->get();
        return view('admin.index')->with('users',$result);
    }
    //删除用户
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/index');
    }

    //显示添加用户的页面
    public function showadd()
    {
        return view('admin.adduser');
    }
    //添加用户
    public function add(UserRegisterRequest $request)
    {
        $confirmed_code = str_random(10);
        $data = [
            'avatar'=>'Home/img/default.jpg',
            'confirmed_code' => $confirmed_code,
        ];
        $result = User::create(array_merge($request->all(),$data));
        if ($result){
            return redirect('admin/index');
        }else{
            return back();
        }
    }

    //显示用户学校信息
    public function showschool()
    {
        $result = DB::table('information')->get();
        $uid = $result->toArray();
        $uid = $uid[0]->uid;
//        dd($uid);
        return view('admin.school')->with('school',$result)->with('uid',$uid);

    }
    //修改用户学校信息
    public function school(Request $request,$uid )
    {
        $school = Information::find($uid);
        $school->school = $request->input('school','');
        $school->identity = $request->input('identity','');
        $school->counts = $request->input('counts','');
        $result = $school->save();
        if ($result){
            return redirect('/showschool');
        }else{
            return back();
        }
    }

    //显示用户工作信息
    public function showwork()
    {
        $result = DB::table('information')->get();
        $uid = $result->toArray();
        $uid = $uid[0]->uid;
//        dd($uid);
        return view('admin.work')->with('work',$result)->with('uid',$uid);

    }

    //修改用户工作信息
    public function work(Request $request,$uid )
    {
        $work = Information::find($uid);
        $work->company = $request->input('company','');
        $work->indutry = $request->input('indutry','');
        $work->position = $request->input('position','');
        $result = $work->save();
        if ($result){
            return redirect('/showwork');
        }else{
            return back();
        }
    }

    //显示用户喜欢信息
    public function showlike()
    {
        $result = DB::table('information')->get();
        $uid = $result->toArray();
        $uid = $uid[0]->uid;
//        dd($uid);
        return view('admin.like')->with('like',$result)->with('uid',$uid);

    }

    //修改用户喜欢信息
    public function like(Request $request,$uid )
    {
        $like = Information::find($uid);
        $like->music = $request->input('music','');
        $like->book = $request->input('book','');
        $like->movie = $request->input('movie','');
        $like->game = $request->input('game','');
        $result = $like->save();
        if ($result){
            return redirect('/showlike');
        }else{
            return back();
        }
    }


    //显示用户基本信息
    public function showinformation()
    {
        $result = DB::table('users')->get();
        $id = $result->toArray();
        $id = $id[0]->id;
        return view('admin.information')->with('users',$result)->with('id',$id);
    }

    //修改用户基本信息
    public function information(Request $request,$id)
    {
        $personal = User::find($id);
        $icon = $personal->get()->toArray();
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
            $request->file('pic')->move('img/admin',$iconname);
            $personal->avatar = $iconname;
            if ( !($personal->avatar == 'Home/img/default.jpg')){
                unlink('img/admin/'.$icons);
            }
        }
        $result = $personal->save();
        //判断是否修改成功
        if ($result){
            return redirect('/showinformation');
        }else{
            return back();
        }
    }


}
