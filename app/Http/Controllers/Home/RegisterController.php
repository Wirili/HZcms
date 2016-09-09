<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

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
        //$this->middleware('guest',['except' => 'register']);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        $parent_name=$request->input('r','');
        return view('home.register',[
            'parent_name'=>$parent_name
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'parent_name' => 'required|max:255|parent_name',
            'name' => 'required|alpha_dash|max:255|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password',
            'password2' => 'required|min:6',
            'password2_confirmation' => 'required_with:password2|same:password',
            'code' => 'required|captcha',
        ],[
            'parent_name.required' => '请输入直推会员',
            'parent_name.max' => '直推会员长度不能超过:max',
            'parent_name.parent_name' => '直推会员不存在',
            'name.required' => '请输入玩家编号',
            'name.alpha_dash' => '请输入字母、数字或下划线',
            'name.max' => '玩家编号长度不能超过:max',
            'name.unique' => '输入的玩家编号已存在',
            'password.required' => '请输入的登陆密码',
            'password.min' => '登陆密码不能少于6个字符',
            'password_confirmation.required_with' => '请输入确认密码',
            'password_confirmation.same' => '确认密码输入错误',
            'password2.required' => '请输入的资金密码',
            'password2.min' => '资金密码不能少于6个字符',
            'password2_confirmation.required_with' => '请输入确认密码',
            'password2_confirmation.same' => '确认密码输入错误',
            'code.required' => '请输入验证码',
            'code.captcha' => '验证码不正确',
        ]);
        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return new JsonResponse(['status' => 'error', 'msg' => $validator->errors()->getMessages()]);
            }
        }

        $this->guard()->login($this->create($request->all()));

        return new JsonResponse(['status' => 'success', 'msg' => '注册成功']);
//        return redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->parent_id=User::where('name',$data['parent_name'])->first()->user_id;
        $user->name=$data['name'];
        $user->password=\Hash::make($data['password']);
        $user->password2=\Hash::make($data['password2']);
        $user->save();
        return $user;
    }
}
