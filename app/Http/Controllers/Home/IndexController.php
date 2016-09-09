<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Article;

class IndexController extends Controller
{
    public function index()
    {
        $article=Article::orderBy('id','desc')->take(5)->get();
        return view('home.index',[
            'page_title'=>trans('menu.home'),
            'article'=>$article
        ]);
    }

    public function lock_fail()
    {
        return view('home.lock_fail');
    }

    public function pass_fail()
    {
        return view('home.pass_fail');
    }
}
