<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;

class NewController extends Controller
{
    //
    public function list()
    {
        $list=Article::paginate(15);
        return view('home.new_list',[
            'page_title'=>trans('menu.new_list'),
            'list'=>$list
        ]);
    }

    public function show($id)
    {
        $new=Article::find($id);
        return view('home.new_show',[
            'page_title'=>trans('menu.new_show'),
            'new'=>$new
        ]);
    }
}
