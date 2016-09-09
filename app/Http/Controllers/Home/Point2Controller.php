<?php

namespace App\Http\Controllers\home;

use App\Functions\Settle;
use App\Models\LogPoint2;
use App\models\UserMsg;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Point2Sell;
use Validator;

class Point2Controller extends Controller
{
    //

    /**
     * 拍卖列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sell_list()
    {
        $farm=Settle::settle_day(\Auth::user()->user_id);
        $list=Point2Sell::where([['state',trans('log2.state.sell')],['is_delete',0]])->orderBy('id','asc')->take(5)->get();
        return view('home.point2_sell_list',[
            'page_title' => trans('menu.point2_sell_list'),
            'list'=>$list
        ]);
    }

    /**
     * 马上挂单
     * @param Request $request
     * @return JsonResponse
     */
    public function sell(Request $request)
    {
        //数据验证
        $user=\Auth::user();

        //数据验证
        $validator = Validator::make(array_merge($user->toArray(),$request->all()), [
            'alipay_name' => 'required',
            'alipay_fullname' => 'required',
            'mobile' => 'required',
            'num' => 'required|max:'.$user->point2,
        ], [
            'alipay_name.required' => '请完善个人资料(淘宝账号跟手机)后在出售金币',
            'alipay_fullname.required' => '请完善个人资料(淘宝账号跟手机)后在出售金币',
            'mobile.required' => '请完善个人资料(淘宝账号跟手机)后在出售金币',
            'num.required' => '请输入挂售金币',
            'num.max' => '金币不足',
        ]);
        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return new JsonResponse(['status' => 'error', 'msg' => $validator->errors()->getMessages()]);
            }
        }
        $num=intval($request->num);
        //扣钱
        $user->point2-=$num;
        $user->save();
        //扣钱记录
        LogPoint2::create([
            'user_id'=>$user->user_id,
            'price'=> - $num,
            'about'=>trans('log2.about.sell'),
            'type'=>trans('log2.type.sell'),
        ]);
        //插入拍卖记录
        $sell=new Point2Sell();
        $sell->user_id=$user->user_id;
        $sell->state=trans('log2.state.sell');
        $sell->alipay_name=$user->alipay_name;
        $sell->alipay_fullname=$user->alipay_fullname;
        $sell->weixin=$user->weixin;
        $sell->mobile=$user->mobile;
        $sell->money=$num;
        $sell->add_time=date('Y-m-d H:i:s');
        $sell->save();
        //系统消息
        UserMsg::create([
            'to_user_id'=>$user->user_id,
            'info'=>trans('msg.info.point2_sell',['num'=>$num]),
            'type'=>trans('msg.type.system'),
        ]);
        return new JsonResponse(['status' => 'success', 'msg' => '金币拍卖成功']);
    }

    /**
     * 马上购买
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function buy(Request $request)
    {
        $request->has('id')?$id=$request->id:$id=0;
        //数据验证
        $user=\Auth::user();
        $sell=Point2Sell::find($id);
        if($sell){
            if($user->user_id==$sell->user_id)
                return new JsonResponse(['status' => 'error', 'msg' => '不能购买自己出售的金币']);
            $sell->buy_user_id=$user->user_id;
            $sell->buy_time=date('Y-m-d H:i:s');
            $sell->state=trans('log2.state.buy');
            $sell->save();
            return new JsonResponse(['status' => 'success', 'msg' => '购买成功']);
        }else{
            return new JsonResponse(['status' => 'error', 'msg' => '拍卖信息不存在']);
        }
    }

    /**
     * 卖家放弃出售
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function sell_quit(Request $request)
    {
        $request->has('id')?$id=$request->id:$id=0;
        //数据验证
        $user=\Auth::user();
        $sell=Point2Sell::where([['id',$id],['state',trans('log2.state.sell')],['user_id',$user->user_id]])->first();
        if($sell){
            $sell->buy_time=null;
            $sell->state=trans('log2.state.quit');
            $sell->save();
            return new JsonResponse(['status' => 'success', 'msg' => '放弃成功']);
        }else{
            return new JsonResponse(['status' => 'error', 'msg' => '拍卖信息不正确']);
        }
    }

    /**
     * 买家放弃购买
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function buy_quit(Request $request)
    {
        $request->has('id')?$id=$request->id:$id=0;
        //数据验证
        $user=\Auth::user();
        $sell=Point2Sell::where([['id',$id],['state',trans('log2.state.buy')],['buy_user_id',$user->user_id]])->first();
        if($sell){
            $sell->buy_user_id=0;
            $sell->buy_time=null;
            $sell->state=trans('log2.state.sell');
            $sell->save();
            return new JsonResponse(['status' => 'success', 'msg' => '放弃成功']);
        }else{
            return new JsonResponse(['status' => 'error', 'msg' => '拍卖信息不正确']);
        }
    }

    /**
     * 金币拍卖购买列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function buy_log()
    {
        $list=Point2Sell::where('buy_user_id',\Auth::user()->user_id)->paginate(15);
        return view('home.point2_buy_log',[
            'page_title' => trans('menu.point2_buy_log'),
            'list'=>$list
        ]);
    }

    /**
     * 金币拍卖出售列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sell_log()
    {
        $list=Point2Sell::where('user_id',\Auth::user()->user_id)->paginate(15);
        return view('home.point2_sell_log',[
            'page_title' => trans('menu.point2_sell_log'),
            'list'=>$list
        ]);
    }
}
