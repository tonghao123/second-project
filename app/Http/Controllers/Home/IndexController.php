<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
<<<<<<< HEAD
    //
    public function index()
    {
        return view('home/index');
=======
    public function index()
    {
        return view('model.homemodel');
>>>>>>> shen
    }
    //登录
    public function login()
    {
        return view('home.login');
    }
<<<<<<< HEAD
=======
    public function photo()
    {
        return view('home.photo');
    }
>>>>>>> shen
}
