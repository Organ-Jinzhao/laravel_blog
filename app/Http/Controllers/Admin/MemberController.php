<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MemberCreateRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Models\Member;
use App\Models\Member_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class MemberController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.member.index');
    }
    public function data(Request $request)
    {
        $model = Member::query();
        //查询用户信息表
        $model = $model->select("members.*","members_info.user_id")->leftJoin('members_info', 'members.id', '=', 'members_info.user_id');
        if ($request->get('name')){
            $model = $model->where('name','like','%'.$request->get('name').'%');
        }
        if ($request->get('phone')){
            $model = $model->where('phone','like','%'.$request->get('phone').'%');
        }
        $res = $model->orderBy('created_at','desc')->paginate($request->get('limit',30))->toArray();
        $data = [
            'code' => 0,
            'msg'   => '正在请求中...',
            'count' => $res['total'],
            'data'  => $res['data']
        ];
        return response()->json($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberCreateRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['uuid'] = \Faker\Provider\Uuid::uuid();
        if (Member::create($data)){
            return redirect()->to(route('admin.member'))->with(['status'=>'添加账号成功']);
        }
        return redirect()->to(route('admin.member'))->withErrors('系统错误');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.member.edit',compact('member'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberUpdateRequest $request, $id)
    {
        $member = Member::findOrFail($id);
        $data = $request->except('password');
        if ($request->get('password')){
            $data['password'] = bcrypt($request->get('password'));
        }
        if ($member->update($data)){
            return redirect()->to(route('admin.member'))->with(['status'=>'更新用户成功']);
        }
        return redirect()->to(route('admin.member'))->withErrors('系统错误');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (empty($ids)){
            return response()->json(['code'=>1,'msg'=>'请选择删除项']);
        }
        if (Member::destroy($ids)){
            return response()->json(['code'=>0,'msg'=>'删除成功']);
        }
        return response()->json(['code'=>1,'msg'=>'删除失败']);
    }

    public function info($id)
    {
        //先查用户的用户下面是否存在详细信息id
        $userinfo=Member_info::where("user_id",$id)->first();
        if(empty($userinfo)){
            return view('admin.member.info',compact('id'));
        }else {
            //通过城市信息 搞出同级市区，县区
            $cc = DB::table('area')->where('name',$userinfo->city)->first();
            $citys = DB::table('area')->where('pid',$cc->pid)->get();
            $areas = DB::table('area')->where('pid',$cc->id)->get();
            return view('admin.member.info',compact('userinfo','id','citys','areas'));
        }
    }

    public function infoCreate(Request $request ,$id){
        $member=Member::where("id",$id)->first();
        $data = $request->all();
        $province = DB::table("area")->where("id", $data['province'])->select('name')->first();
        $city = DB::table("area")->where("id", $data['city'])->select('name')->first();
        $area = DB::table("area")->where("id", $data['area'])->select('name')->first();
        $data['province'] = $province->name;
        $data['city'] = $city->name;
        $data['area'] = $area->name;
        if($member->info_id == 0) {
            //插入用户信息，获取插入的主键ID
            $info_id = Member_info::create($data);
            //更新用户表用户信息ID
            $res = Member::where('id', $id)->update(['info_id' => $info_id->id]);
        }else{
            unset($data['_token']);
            $res = Member_info::where("id",$member->info_id)->update($data);
        }

        if($res){
            return redirect()->to(route("admin.member.info",array('id'=>$id)))->with(['status'=>'更新信息']);
        }
        return redirect()->to(route("admin.member.info",array('id'=>$id)))->withErrors('系统错误,稍后重试');
    }

}
