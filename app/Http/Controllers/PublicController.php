<?php
namespace App\Http\Controllers;

use App\Traits\Msg;
use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    //手机号验证
    use Msg;
    //图片上传处理
    public function uploadImg(Request $request)
    {
        //上传文件最大大小,单位M
        $maxSize = 10;
        //支持的上传图片类型
        $allowed_extensions = ["png", "jpg", "gif","jpeg"];
        //返回信息json
        $data = ['code'=>200, 'msg'=>'上传失败', 'data'=>''];
        //设置图片存储位置
        $imglocation="/uploads/";
        $dirname=$imglocation.$request->dirname.'/';
        $file = $request->file('file');
        //检查文件是否上传完成
        if ($file->isValid()){
            //检测图片类型
            $ext = $file->getClientOriginalExtension();
            if (!in_array(strtolower($ext),$allowed_extensions)){
                $data['msg'] = "请上传".implode(",",$allowed_extensions)."格式的图片";
                return response()->json($data);
            }
            //检测图片大小
            if ($file->getClientSize() > $maxSize*1024*1024){
                $data['msg'] = "图片大小限制".$maxSize."M";
                return response()->json($data);
            }
        }else{
            $data['msg'] = $file->getErrorMessage();
            return response()->json($data);
        }
        //创建目录
        $dir=$this->createDir($dirname);
        $newFile = date('Y-m-d')."_".uniqid().".".$file->getClientOriginalExtension();
        //保存图片到指定目录
        $res=$file->move($dir,$newFile);

        if($res){
            $data = [
                'code'  => 0,
                'msg'   => '上传成功',
                'data'  => $newFile,
                'url'   => $dirname.$newFile,
            ];
        }else{
            $data['data'] = $file->getErrorMessage();
        }
        return response()->json($data);
    }

    //创建目录
    private function createDir($subdir)
    {
        //拼接目录路径
        $path = base_path().'/public'.$subdir;
        if(is_dir($path)){
            return $path;
        }
        if(mkdir($path,0777,true)){
            return $path;
        }
        return false;
    }

    //省市区表操作
    public static function getProvince(){
        $data=DB::table('area')->where('level',1)->get()->toArray();
        return $data;
    }
    public function getCity($province){
        //检查$province是否是id还是城市名称
            $data=DB::table('area')->where('pid',$province)->get()->toArray();
        return $data;
    }
    public function getArea($city){
            $data=DB::table('area')->where('pid',$city)->get()->toArray();
        return $data;

    }

}