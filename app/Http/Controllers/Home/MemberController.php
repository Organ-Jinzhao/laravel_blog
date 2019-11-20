<?php

namespace App\Http\Controllers\Home;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\HomebaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Member_info;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redis;


class MemberController extends HomebaseController
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:member')->except(['index','logout']);
    }

    public function index()
    {
        return '会员主页登录后才能访问'.auth('member')->user()->name.auth('member')->user()->phone;
    }

//    //注册表单
//    public function showRegisterForm()
//    {
//        return view('home.member.register');
//    }
    //注册
    public function register(Request $request)
    {
        $create_member = $request->reg;
        $validator = \Validator::make($create_member, [
            'name' => 'required|unique:members',
            'password' => 'required|min:6',
            'password_confirmation'=> 'required|same:password',//不为空,两次密码是否相同
            'phone' => 'required|numeric|regex:/^1[3456789][0-9]{9}$/|unique:members',
            'captcha' => 'required|captcha',
        ],[
              'captcha.captcha' => '验证码错误'
        ]);
        if ($validator->fails()) {
            $err=$validator->errors();
            $arr=json_decode($err,true);
            //取第一个错误信息提示出去
            $err=array_shift($arr);
            //返回错误信息
            $data = [
                'code' => 2,
                'msg'  => $err[0]
            ];
            return response()->json($data);
        }
        $create_member['password'] = bcrypt($create_member['password']);
        $create_member['uuid'] = \Faker\Provider\Uuid::uuid();
        if ($member = Member::create($create_member)){
            $data = [
                'code' => 1,
                'msg'  => '注册成功！'
            ];
        }else{
            $data = [
                'code' => 2,
                'msg'  => '系统异常，注册失败！'
            ];
        }
        return response()->json($data);
    }

    //登录表单
    public function showLoginForm()
    {
        return view('home.member.logins');
    }

    //登录成功后重定向地址
    public function redirectTo()
    {
        return route('home');
    }

    /**
     * @param Request $request
     * 登录验证
     */
    public function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha',
        ],[
            'captcha.captcha'=>'验证码填写错误',
        ]);
    }

    /**
     * @return string
     * 登录验证的字段
     */
    public function username()
    {
        return 'name';
    }

    //注销、退出
    public function logout(Request $request)
    {
        $this->guard()->logout();
        //删除登录信息和游客标识
        session()->forget('guest');
        session()->forget('member');
        $request->session()->invalidate();

        return redirect('/');
    }

    protected function guard()
    {
        return Auth::guard('member');
    }

}
