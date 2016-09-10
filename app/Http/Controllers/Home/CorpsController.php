<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Models\CorpsMember;

class CorpsController extends Controller
{
    //
    public function index()
    {
        $groups=CorpsMember::where([['user_id',\Auth::user()->user_id],['level','<>',0],['position','<>',0]])->select('group')->distinct()->get();
        $corps=CorpsMember::where([['level','<>',0],['position','<>',0]])
            ->whereIn('group',$groups)
            ->orderBy('group')
            ->orderBy('level')
            ->orderBy('position')
            ->get();
        return view('home.corps_index',[
            'page_title'=>trans('menu.corps_index'),
            'groups'=>$groups,
            'corps'=>$corps,
        ]);
    }
}
