<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {
        return view('model.homemodel');

    }
    //登录
    public function login()
    {
        return view('home.login');
    }


    public function photo()
    {
        return view('home.photo');
    }

}
