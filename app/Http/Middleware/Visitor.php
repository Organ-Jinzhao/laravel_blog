<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\Infomation;
use App\Models\Visitors;
use Illuminate\Support\Facades\Redis;


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

        //设置两个小时失效，记录登录用户信息
        if(!Redis::exists('user')){
            $data['time'] = time();
            $data['ip'] = Infomation::getIp();
            $address = Infomation::findCityByIp($data['ip']);
            $data['system'] = Infomation::get_os($request->header('user-agent'));
            $data['brower'] = Infomation::get_broswer($request->header('user-agent'));

            $data['country'] = $address['data']['country'];
            $data['city'] = $address['data']['city'];
            $data['county'] = $address['data']['county'];
            $data['isp'] = $address['data']['isp'];
            $data['nick'] = self::random(10);
            //返回插入ID
            $data['id'] = Visitors::create($data)->id;
            if($data['id']){
                Redis::setex('user', 7200, serialize($data));
            }else{
                Redis::setex('user', 7200, 'null');
            }
        }
        return $next($request);
    }

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
