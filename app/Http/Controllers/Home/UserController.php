<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    //注册
    public function reg()
    {
        return view('home.reg');
    }
    //保存用户信息
    public function store(UserRegisterRequest $request)
    {
//        dd($request->all());
        $confirmed_code = str_random(10);
        $data = [
            'avatar'=>'Home/img/default.jpg',
            'confirmed_code' => $confirmed_code,
        ];
       $user = User::create(array_merge($request->all(),$data));
       //发送邮件        用户  视图  邮件信息
        $view = 'home.emailConfirmed';
        $subject = '请验证邮箱';
        $this->sendEmail($user,$view,$subject,$data);
        return redirect('/');
    }
    public function sendEmail($user,$view,$subject,$data)
    {
        Mail::send($view, $data, function ($m) use ($subject,$user) {
            $m->to($user->email)->subject($subject);
        });
    }

    public function emailConfirm($code)
    {
        //dd($code);
        //查询与之匹配的这个用户
        $user = User::where('confirmed_code', $code)->first();
        //dd($user);
        if (is_null($user)) {
            return redirect('/');
        }
        $user->confirmed_code = str_random(10);
        $user->is_confirmed = 1;
        $user->save();
        return redirect('home/login');
    }

    //显示登录
    public function login()
    {
        return view('home.login');
    }

    //处理登录
    public function singin(UserLoginRequest $request)
    {
        //dd($request->all());
        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
        //dd($flag);
        return redirect('/');
    }

    //用户注销
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
