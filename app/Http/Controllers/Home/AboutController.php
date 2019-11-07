<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\HomebaseController;
use App\Models\Member;


class AboutController extends HomebaseController
{

    public function index()
    {
        $info = Member::select("members.*","members_info.summary","members_info.city","members_info.area")
            ->where('members.id',5)->rightJoin('members_info', 'members.id', '=', 'members_info.user_id')->first();
        return view('home.about.index',compact('info'));
    }

}
