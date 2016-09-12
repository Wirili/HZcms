<?php

namespace App\Functions;

use App\Models\LogPoint2;
use App\Models\UserFarm;
use App\Models\User;
use App\Models\Config;

class Settle
{
    public static function settle_day($user_id)
    {
        $total_money = 0;
        $farm = UserFarm::where([['user_id', $user_id], ['is_end', 0], [\DB::raw('DATEDIFF(sysdate(),add_time)'), '>', 0]])
            ->whereRaw('(DATEDIFF(sysdate(),settle_time) <> 0 or settle_time is null)')
            ->selectRaw('*,DATEDIFF(sysdate(),settle_time) as diffDaysS,DATEDIFF(sysdate(),add_time) as diffDaysA')->get();

        foreach ($farm as $item) {
            $diffday = $item->diffDaysS;
            if (is_null($diffday))
                $diffday = $item->diffDaysA;
            $diffday = intval($diffday);

            if ($diffday <= 0)
                continue;

            $settleday = $diffday;
            if ($settleday + $item->settle_len > $item->life) {
                $settleday = $item->life - $item->settle_len;
            }

            if ($settleday > 0) {
                if ($settleday + $item->settle_len >= $item->life)
                    $item->is_end = 1;
                else
                    $item->is_end = 0;
                $settle_money = $settleday * $item->point2_day * $item->num;
                $total_money += $settle_money;
                $item->settle_len += $settleday;
                $item->settle_time = date('Y-m-d');
                $item->save();
            }
        }
        if ($total_money > 0) {
            //加钱
            $user = User::find($user_id);
            $user->point2 += $total_money;
            $user->save();
            //记录
            LogPoint2::create([
                'user_id' => $user_id,
                'type' => trans('log2.type.farm_return'),
                'price' => $total_money,
                'about' => trans('log2.about.farm_return'),
            ]);
            self::bonus_day($user_id, $total_money, $user_id);
        }
        return $farm;
    }

    public static function bonus_day($buy_user_id, $total_money, $cur_user_id, $level = 1)
    {
        $config = Config::getConfig();
        $buy_user = User::find($buy_user_id);
        if ($level > 5)
            return true;
        $bonus = floatval($config['point2rem.' . $level]) / 100 * $total_money;
        $user = User::find($cur_user_id);
        if ($user) {
            if ($bonus > 0) {
                $parent = User::find($user->parent_id);
                if ($parent) {
                    //加钱
                    $parent->point2 += $bonus;
                    $parent->save();
                    LogPoint2::create([
                        'user_id' => $parent->user_id,
                        'price' => $bonus,
                        'type' => trans('log2.type.rem_return'),
                        'about' => trans('log2.about.rem_return', [
                            'level' => $level,
                            'name' => $buy_user->name
                        ]),
                    ]);
                    self::bonus_day($buy_user_id, $total_money, $user->parent_id, $level + 1);
                }
            }
        }
    }
}