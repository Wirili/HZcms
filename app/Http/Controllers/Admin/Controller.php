<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        \App::setLocale('zh/admin');
    }

    /**
     * @param string $content
     * @param string $link
     * @param string $type error|success
     * @param int $wait
     * @return mixed
     */
    public function Msg($content,$link='',$type='success',$wait=2){
        if (empty($link))
            $link = 'javascript:history.back();';
        $title = $type=='error'?'错误信息':'提示信息';
        return view('admin.msg',[
            'title'=>$title,
            'content'=>$content,
            'link'=>$link,
            'type'=>$type,
            'wait'=>$wait
        ]);
    }

    public function adminGate($permission){
        return \Auth::guard('admin')->user()->can($permission);
    }
}
