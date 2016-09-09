<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\UserMsg;

class MessageController extends Controller
{
    /**
     * 站内信
     *
     * @param $act
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function message($act)
    {
        if ($act == 'out') {
            $page_title='发件箱';
            $where[]=['user_id',\Auth::user()->user_id];
        } else {
            $page_title='收件箱';
            $where[]=['to_user_id',\Auth::user()->user_id];
        }
        $msg=UserMsg::where($where)->paginate(12);
        return view('home.message',[
            'page_title' => $page_title,
            'msg' => $msg,
        ]);
    }
}
