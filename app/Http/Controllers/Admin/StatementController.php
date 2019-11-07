<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StatementRequest;
use App\Models\Statement;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = Statement::select('author')->with(['member'])->get()->toArray();
        //去重用户查询
        $author=array_unique($array, SORT_REGULAR);
        return view('admin.statement.index',compact('author'));
    }

    public function data(Request $request)
    {
        $model = Statement::query();
        if ($request->get('created_at')) {
            $model = $model->where('created_at','>',strtotime($request->get('created_at')));
            $model = $model->where('created_at','<',strtotime($request->get('created_at'))+(24*60*60));
        }
        if ($request->get('title')){
            $model = $model->where('title','like','%'.$request->get('title').'%');
        }
        if ($request->get('author')){
            $model = $model->where('author','=',$request->get('author'));
        }
        $res = $model->orderBy('created_at','desc')->with(['member'])->paginate($request->get('limit',30))->toArray();
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
        $author = Member::select('id','name')->get()->toArray();
        return view('admin.statement.create',compact('author'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatementRequest $request)
    {
        $data = $request->only(['image', 'author', 'like', 'content', 'weather', 'click']);
        if (Statement::create($data)) {
            return redirect(route('admin.statement'))->with(['status' => '添加成功']);
        }
        return redirect(route('admin.statement'))->withErrors(['status'=>'添加失败']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Member::select('id','name')->get()->toArray();
        $statement = Statement::findOrFail($id);
        return view('admin.statement.edit',compact('author','statement'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatementRequest $request, $id)
    {
        $data = $request->only(['image','author','like','content','weather','click']);
        $article = Statement::findOrFail($id);
        if ($article->update($data)){
            return redirect(route('admin.statement'))->with(['status'=>'更新成功']);
        }
        return redirect(route('admin.statement'))->withErrors(['status'=>'系统错误']);
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
        foreach (Statement::whereIn('id',$ids)->get() as $model){
            $model->delete();
        }
        return response()->json(['code'=>0,'msg'=>'删除成功']);
    }

}
