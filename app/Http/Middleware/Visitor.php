<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\Infomation;
use App\Models\Visitors;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;


class Visitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {

        if(session()->has('guest')){
            $guest = session()->get('guest');//读取redis保存的游客标识
        }else{
            $guest = 2;//游客标识
        }
        //当没有身份，且检测到会员登录
        if((!session()->has('member') || $guest == 2) && !Auth::guard('member')->guest()){
            $data['time'] = date('Y-m-d H:i:s');
            $data['ip'] = Infomation::getIp();
            $address = Infomation::findCityByIp($data['ip']);
            $data['system'] = Infomation::get_os($request->header('user-agent'));
            $data['brower'] = Infomation::get_broswer($request->header('user-agent'));
            $data['country'] = $address['data']['country'];
            $data['city'] = $address['data']['city'];
            $data['county'] = $address['data']['county'];
            $data['isp'] = $address['data']['isp'];
            $data['pid'] = auth('member')->user()->id;
            $data['nick'] = auth('member')->user()->name;
            $flag = Visitors::create($data)->id;
            if ($flag) {
                session()->put('member',$data);
                session()->put('guest',1);
            } else {
                session()->put('member','null');
            }
        }


        //没没有任何身份记录，且会员没登录，赋值游客身份
        if (!session()->has('member') && Auth::guard('member')->guest()) {
            $data['time'] = date('Y-m-d H:i:s');
            $data['ip'] = Infomation::getIp();
            $address = Infomation::findCityByIp($data['ip']);
            $data['system'] = Infomation::get_os($request->header('user-agent'));
            $data['brower'] = Infomation::get_broswer($request->header('user-agent'));
            $data['country'] = $address['data']['country'];
            $data['city'] = $address['data']['city'];
            $data['county'] = $address['data']['county'];
            $data['isp'] = $address['data']['isp'];
            $data['pid'] = 0;//游客模式pid为0
            $data['nick'] = self::random(10);
            //返回插入ID
            $flag = Visitors::create($data)->id;
            if ($flag) {
                session()->put('member',$data);
                session()->put('guest',2);
            } else {
                session()->put('member','null');
            }
        }

        return $next($request);

    }

//    public function sss($request, Closure $next)
//    {
//
//        //设置两个小时失效，记录登录用户信息
//        if (Auth::guard('member')->guest()) {
//            if (!Redis::exists('user')) {
//                $data['time'] = time();
//                $data['ip'] = Infomation::getIp();
//                $address = Infomation::findCityByIp($data['ip']);
//                $data['system'] = Infomation::get_os($request->header('user-agent'));
//                $data['brower'] = Infomation::get_broswer($request->header('user-agent'));
//
//                $data['country'] = $address['data']['country'];
//                $data['city'] = $address['data']['city'];
//                $data['county'] = $address['data']['county'];
//                $data['isp'] = $address['data']['isp'];
//                $data['nick'] = self::random(10);
//                //返回插入ID
//                $data['id'] = Visitors::create($data)->id;
//                if ($data['id']) {
//                    Redis::setex('user', 7200, serialize($data));
//                } else {
//                    Redis::setex('user', 7200, 'null');
//                }
//            }
//        }else{
//            echo 232;
//        }
//
//        return $next($request);
//
//    }

    //随机昵称
    public static function random($length) {
        $hash = '游客';
        $chars = '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
        $max = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
        return $hash;
    }
}
