<?php

namespace App\Http\Controllers\Home;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Config;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->config=Config::getConfig();
        view()->share('C',$this->config);
    }

    public function showLoginForm()
    {
        return view('home.login');
    }

    public function username()
    {
        return 'name';
    }
}
