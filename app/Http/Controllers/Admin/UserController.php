<?php

namespace App\Http\Controllers\Admin;


use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class UserController extends Controller
{
    //用户列表
    public function userList()
    {

        $users = User::paginate(5);
        foreach ($users as $user) {
            $roles = array();
//            dd($user->perms);


            foreach ($user->roles as $role) {

                $roles[] = $role->display_name;
//                dump($perm->display_name);
            }
            $user->roles = implode(',', $roles);
//            dd($users[0]->roles);
        }
        return view('admin/userlist', compact('users'));

    }

    //新增用户
    public function useradd(Request $request)
    {
        $confirmed_code = str_random('10');
//        dd($confirmed_code);
        if ($request->isMethod('post')){
            $uu=User::create(array_merge($request->all(),['avatar'=>'home/img/default.jpg','confirmed_code'=>$confirmed_code]));
            if(count($uu) == 0){
                return back()->withErrors('新增用户失败');
            }
            return redirect('admin/user-list')->withErrors('新增用户成功');
        }
        return view('admin/useradd');
    }

    //修改
    public function userupdate(Request $request, $user_id)
    {
//        Role::
        if ($request->isMethod('post')){
            $user = User::findOrFail($user_id);
            $uer=$user -> update($request->all());
            if($uer == false){
                return back()->withErrors('更新用户失败');
            }
            return redirect('admin/user-list')->withErrors('更新用户成功');
        }
//        查询当前id数据
        $user = User::findOrFail($user_id);
        return view('admin/userupdate', compact('user'));
    }

    public function userdelete($user_id)
    {
        $uuid=User::destroy($user_id);
        if($uuid == 0){
            return back()->withErrors('删除用户失败');
        }
        return redirect('admin/user-list')->withErrors('删除用户成功');
    }
    //分配用户
    public function allotrole(Request $request, $user_id)
    {
        if ($request->isMethod('post')){
            //获取当前用户的角色

            $user = User::find($user_id);
//dd($request->input('permission_id'));
            $all=DB::table('role_user')->where('user_id', $user_id)->delete();
            if($request->input('role_id')) {
                foreach ($request->input('role_id') as $role_id) {
                    $user->attachRole(Role::find($role_id));
                }
            }
            return redirect('admin/user-list')->withErrors('分配角色成功');
        }
         $roles = Role::all();


        return view('admin/allotrole', compact('roles','user_id'));
    }

}
