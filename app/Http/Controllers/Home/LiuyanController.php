<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\HomebaseController;
use Illuminate\Support\Facades\Redis;


class LiuyanController extends HomebaseController
{


    public function index()
    {
        return view('home.liuyan.index');
    }


}
