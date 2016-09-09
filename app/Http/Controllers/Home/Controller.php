<?php

namespace App\Http\Controllers\Home;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Config;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $config=null;
    public function __construct()
    {
        $this->middleware('auth',['except' => ['pass_fail','lock_fail']]);
        $this->config=Config::getConfig();
        view()->share('C',$this->config);
    }
}
