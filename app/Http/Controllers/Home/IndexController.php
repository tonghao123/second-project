<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('home/index');
    }
    //登录
    public function login()
    {
        return view('home.login');
    }
}
