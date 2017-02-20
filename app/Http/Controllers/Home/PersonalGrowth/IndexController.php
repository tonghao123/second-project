<?php

namespace App\Http\Controllers\Home\PersonalGrowth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function character()
    {
       return view('home.PersonalGrowth.myrp');
    }
    public function calendar()
    {
       return view('home.PersonalGrowth.myCaledar');
    }
    public function points()
    {
        return view('home.PersonalGrowth.myPoints');
    }
    public function grade()
    {
        return view('home.PersonalGrowth.myGrade');
    }
    public function introduction()
    {
        return view('home.PersonalGrowth.myIntroduction');
    }

}
