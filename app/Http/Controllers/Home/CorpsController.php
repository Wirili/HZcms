<?php

namespace App\Http\Controllers\home;

use App\Models\LogPoint2;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\CorpsMember;
use Validator;

class CorpsController extends Controller
{
    //
    public function index()
    {
        $groups=CorpsMember::where([['user_id',\Auth::user()->user_id],['level','<>',0],['position','<>',0]])
            ->select('group')
            ->orderBy('group')
            ->distinct()
            ->get();
        $corps=CorpsMember::with('user')->where([['level','<>',0],['position','<>',0]])
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

    public function add(Request $request)
    {
        //数据验证
        $validator = Validator::make(['point2' => \Auth::user()->point2], [
            'point2' => 'numeric|min:' . $this->config['corps_money']
        ], [
            'point2.min'=>'金币不足，不能参加'
        ]);
        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return new JsonResponse(['status' => 'error', 'msg' => $validator->errors()->getMessages()]);
            }
        }

        //扣钱
        \Auth::user()->point2 -= intval($this->config['corps_money']);
        \Auth::user()->save();

        //记录日志
        LogPoint2::create([
            'user_id' => \Auth::user()->user_id,
            'price' => -$this->config['corps_money'],
            'about' => '加入军团成功',
            'type' => '参加军团',
        ]);

        //
        $m=$this->config['corps_max_level'];
        $group=CorpsMember::where([['user_id',\Auth::user()->parent_id],['level','<>',0],['position','<>',0]])
            ->select('group')
            ->orderBy(\DB::raw('rand()'))
            ->distinct()
            ->first();
        if(!$group){
            $group=CorpsMember::where([['level','<>',0],['position','<>',0]])
                ->select('group')
                ->orderBy(\DB::raw('rand()'))
                ->distinct()
                ->first();
        }
        $g=intval($group->group);
        $member=new CorpsMember();
        $member->level=$m;
        $member->group=$g;
        $member->user_id=\Auth::user()->user_id;
        $member->member_no=date('YmdHis').rand(1000,9999);
        $member->position=CorpsMember::position_count($g,$m)+1;
        $member->add_time=date('Y-m-d H:i:s');
        $member->save();

        $award=floatval($this->config['corps_money']);
        $pos=CorpsMember::award($member->position,$m);
        foreach($pos['position'] as $item) {
            $award_member = CorpsMember::where([['level', $pos['level']], ['position', $item]])->first();
            if($award_member) {
                $award_member->user->point2 += floatval($pos['x'])*$award;
                $award_member->user->save();

                //记录日志
                LogPoint2::create([
                    'user_id' => $award_member->user->user_id,
                    'price' => floatval($pos['x'])*$award,
                    'about' => '军团分红',
                    'type' => '军团分红',
                ]);
            }
        }
        CorpsMember::split_corps($g,$m);

        return new JsonResponse(['status' => 'success', 'msg' => '参加成功']);
    }
}
