<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\HomebaseController;


class AlbumController extends HomebaseController
{

    public function index()
    {

        return view('home.album.index');
    }

}
