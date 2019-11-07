<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\HomebaseController;
use App\Models\Article;

class ShopController extends HomebaseController
{

    public function index()
    {
        return view('home.shop.index');
    }
}
