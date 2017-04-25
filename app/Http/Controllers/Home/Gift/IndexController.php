<?php

namespace App\Http\Controllers\Home\Gift;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function gift(Request $request)
    {
         dd($request->all());
    }

}
