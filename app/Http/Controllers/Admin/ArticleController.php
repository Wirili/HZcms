<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Article;
use App\Models\ArticleCat;

class ArticleController extends Controller
{
    //
    protected $breadcrumb=[];

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'same:password_confirm',
    ];

    protected $messages = [
        'name.required' => '请输入管理员名称',
        'email.required' => '请输入电子邮件',
        'password.same' => '两次密码不相同',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:admin');
        $this->breadcrumb[]=['url'=>\URL::route('admin.article.index'),'title'=>trans('article.list')];
    }

    public function index()
    {
        if(!$this->adminGate('article_show')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        return view('admin.article_index',[
            'page_title'=>trans('article.list'),
            'breadcrumb'=>$this->breadcrumb
        ]);
    }

    public function edit($id)
    {
        if(!$this->adminGate('article_edit')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('article.edit')];
        $article = Article::find($id);
        $cat = ArticleCat::all();
        return view('admin.article_edit', [
            'page_title'=>trans('article.edit'),
            'breadcrumb'=>$this->breadcrumb,
            'article' => $article,
            'cat' => $cat
        ]);
    }

    public function create()
    {
        if(!$this->adminGate('article_new')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('article.create')];
        $article = new Article();
        $cat = ArticleCat::all();
        return view('admin.article_edit', [
            'page_title'=>trans('article.create'),
            'breadcrumb'=>$this->breadcrumb,
            'article' => $article,
            'cat' => $cat
        ]);
    }

    public function del($id)
    {
        if(!$this->adminGate('article_del')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $article = Article::find($id);
        if($article) {
            $article->delete();
            return $this->Msg(trans('article.del_success'),\URL::route('admin.article.index'));
        }else
            return $this->Msg(trans('article.del_fail'),\URL::route('admin.article.index'),'error');
    }

    public function save(Request $request)
    {
        if(!$this->adminGate(['article_new','article_edit'])){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
//        $validator = Validator::make($request->all(), $this->rules, $this->messages);
//        if ($validator->fails()) {
//            return $this->Msg('',null,'error')->withErrors($validator);
//        }
        if ($request->has('id')) {
            $article=Article::find($request->id);
        } else {
            $article = new Article();
            $article->add_time=date('Y-m-d H:i:s');
        }

        $article->title = $request->title;
        $article->cat_id = $request->cat_id;
        $article->description = $request->description;
        $article->keywords = $request->keywords;
        $article->description = $request->description;
        $article->contents = $request->input('contents','');
        $article->save();

        return $this->Msg(trans('article.save_success'),\URL::route('admin.article.index'));
    }

    public function ajax(Request $request)
    {
        $filter = $request->only(['draw', 'columns', 'order', 'start', 'length']);
        $data = Article::orderBy($filter['columns'][$filter['order'][0]['column']]['data'], $filter['order'][0]['dir'])->forPage($filter['start'] / $filter['length'] + 1, $filter['length'])->get();
        $recordsTotal = Article::count();
        $recordsFiltered = Article::count();
        return [
            'draw' => intval($filter['draw']),
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $data->toArray()
        ];
    }
}
