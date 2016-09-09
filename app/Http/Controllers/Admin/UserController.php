<?php

namespace App\Http\Controllers\admin;

use App\models\CorpsMember;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    //
    protected $breadcrumb=[];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:admin');
        $this->breadcrumb[]=['url'=>\URL::route('admin.user.index'),'title'=>trans('user.list')];
    }

    public function index()
    {
        if(!$this->adminGate('user_show')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        CorpsMember::split_corps(1,3);
        return view('admin.user_index',[
            'page_title'=>trans('user.list'),
            'breadcrumb'=>$this->breadcrumb
        ]);
    }

    public function edit($id)
    {
        if(!$this->adminGate('user_edit')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('user.edit')];
        $user = User::find($id);
        return view('admin.user_edit', [
            'page_title'=>trans('user.edit'),
            'breadcrumb'=>$this->breadcrumb,
            'user' => $user
        ]);
    }

    public function create()
    {
        if(!$this->adminGate('user_new')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('user.create')];
        $user = new User();
        return view('admin.user_edit', [
            'page_title'=>trans('user.create'),
            'breadcrumb'=>$this->breadcrumb,
            'user' => $user
        ]);
    }

    public function del($id)
    {
        if(!$this->adminGate('user_del')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $user = User::find($id);
        if($user) {
            $user->delete();
            return $this->Msg(trans('user.del_success'),\URL::route('admin.user.index'));
        }else
            return $this->Msg(trans('user.del_fail'),\URL::route('admin.user.index'),'error');
    }

    public function save(Request $request)
    {
        if(!$this->adminGate(['user_new','user_edit'])){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $validator = Validator::make($request->all(), [
                'name' => 'required|unique:users,name,'.$request->id.',user_id',
                'password'=>'alpha_dash|size:6',
            ],[
                'name.required' => '请输入管理员名称',
                'name.unique' => '登陆名已存在，请输入其他用户名',
                'password.alpha_dash' => '只能包含字母和数字，以及破折号和下划线，6个字符以上',
                'password.size' => '6个字符以上',
            ]);

        if ($validator->fails()) {
            return $this->Msg('',null,'error')->withErrors($validator);
        }
        if ($request->has('id')) {
            $user=User::find($request->id);
        } else {
            $user = new User();
            $user->name=$request->name;
            $user->reg_time = date('Y-m-d H:i:s');
            $user->reg_ip = $request->getClientIp();
        }

        $parent=User::where('name',$request->parent_name)->first();
        $user->parent_id = $parent?$parent->user_id:0;
        $user->is_pass = $request->is_pass;
        if(!$user->pass_time&&$user->is_pass==1)
            $user->pass_time = date('Y-m-d H:i:s');
        $user->level = $request->level;
        if($request->has('password'))
            $user->password = \Hash::make($request->password);
        if($request->has('password2'))
            $user->password2 = \Hash::make($request->password2);
        $user->save();

        return $this->Msg(trans('user.save_success'),\URL::route('admin.user.index'));
    }

    public function ajax(Request $request)
    {
        $filter = $request->only(['draw', 'columns', 'order', 'start', 'length']);
        $data = User::with('parent')->orderBy($filter['columns'][$filter['order'][0]['column']]['data'], $filter['order'][0]['dir'])->forPage($filter['start'] / $filter['length'] + 1, $filter['length'])->get();
        $recordsTotal = User::count();
        $recordsFiltered = User::count();
        return [
            'draw' => intval($filter['draw']),
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $data->toArray()
        ];
    }
}
