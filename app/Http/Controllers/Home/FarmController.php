<?php

namespace App\Http\Controllers\Home;

use App\Models\LogPoint2;
use App\models\UserMsg;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Farm;
use App\Models\UserFarm;
use Validator;

class FarmController extends Controller
{
    public function farm()
    {
        $farm = UserFarm::where('is_end', 0)->where('user_id', \Auth::user()->user_id)->paginate(12);
        return view('home.farm', [
            'page_title' => trans('menu.farm'),
            'farm' => $farm
        ]);
    }

    public function farm_detail()
    {
        $farm_sum = UserFarm::where('is_end', 0)->where('user_id', \Auth::user()->user_id)->groupBy('farm_id')->select(\DB::raw('max(title) as title,sum(num) as num'))->get();
        $farm = UserFarm::where('is_end', 0)->where('user_id', \Auth::user()->user_id)->paginate(12);
        return view('home.farm_detail', [
            'page_title' => trans('menu.farm_detail'),
            'farm' => $farm,
            'farm_sum' => $farm_sum,
        ]);
    }

    public function farm_shop()
    {
        $farm = Farm::all();
        return view('home.farm_shop', [
            'page_title' => trans('menu.farm_shop'),
            'farm' => $farm
        ]);
    }

    public function cart_quick(Request $request)
    {
        //数据验证
        $data=$request->data;
        if(!$data)
            return new JsonResponse(['status'=>'error','msg'=>'未购买任何商品！']);
        $ids=array_column($data,'id');
        $num=[];
        foreach ($data as $v){
            $num[$v['id']]=$v['num'];
        }
        $goods=Farm::whereIn('id',$ids)->get();
        if($goods->count()==0)
            return new JsonResponse(['status'=>'error','msg'=>'未购买任何商品！']);
        $user=\Auth::user();
        $total_money=0;
        foreach ($goods as $good) {
            $total_money+=intval($good->money)*intval($num[$good->id]);
            $max=intval(UserFarm::where([['is_end',0],['farm_id',$good->id],['user_id',$user->user_id]])->sum('num'));
            if($max+$num[$good->id]>$good->max_limit)
                return new JsonResponse(['status'=>'error','msg'=>$good->title.' 同时最多只能存在'.$good->max_limit.'只，您最多只能再购买'.($good->max_limit-$max).'只']);
            if(\Auth::user()->level<$good->min_level)
                return new JsonResponse(['status'=>'error','msg'=>'您等级不符合的'.$good->title.'购买条件']);
        }

        if($total_money>$user->point2){
            return new JsonResponse(['status'=>'error','msg'=>'您的余额 '.$user->point2.' 不足以支付: '.$total_money]);
        }

        //历遍购买
        $total_money=0;
        foreach ($goods as $good) {
            $money=intval($good->money)*intval($num[$good->id]);
            $total_money+=$money;
            //扣钱
            $user->point2-=$money;
            $user->save();
            LogPoint2::create([
                'user_id'=>$user->user_id,
                'price'=>-$money,
                'type'=>'购买宠物',
                'about'=>$good->title.' 数量:'.$num[$good->id],
            ]);
            //增加宠物
            $farm=new UserFarm();
            $farm->user_id=$user->user_id;
            $farm->farm_id=$good->id;
            $farm->title=$good->title;
            $farm->image=$good->image;
            $farm->num=$num[$good->id];
            $farm->money=$money;
            $farm->point2_day=$good->point2_day;
            $farm->life=$good->life;
            $farm->is_end=0;
            $farm->settle_len=0;
            $farm->settle_time=null;
            $farm->add_time=date('Y-m-d');
            $farm->end_time=date('Y-m-d',strtotime('+' . $good->life . ' day'));
            $farm->save();
        }
        UserMsg::create([
            'to_user_id'=>$user->user_id,
            'info'=>'恭喜您购买宠物成功，本次共消费'.$total_money.'金币',
            'type'=>'[系统消息]',
            'ip'=>$request->getClientIp(),
            'add_time'=>date('Y-m-d H:i:s')
        ]);

        return new JsonResponse(['status' => 'success', 'msg' => '购买宠物成功']);
    }
}
