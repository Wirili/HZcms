<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CorpsMember extends Model
{
    //
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }

    public static function max_group()
    {
        return self::max('group') + 1;
    }

    //拆分军团
    public static function split_corps($group, $max_level)
    {
        $count = self::where([['group', $group], ['level', '<>', 0], ['position', '<>', 0]])->count();
        if ($count == pow(2, $max_level) - 1) {
            $max_group = self::max_group();

            //更新出局
            self::where([['group', $group], ['level', 1]])->update([
                'level' => 0,
                'position' => 0
            ]);

            self::where([['group', $group], ['level', '>', 1]])
                ->whereRaw('`position` > pow(2,`level`-2)')
                ->update([
                    'position' => \DB::raw("`position` - pow(2,`level`-2)"),
                    'level' => \DB::raw("`level` - 1"),
                    'group' => $max_group
                ]);

            self::where([['group', $group], ['level', '>', 1]])
                ->whereRaw('`position` <= pow(2,`level`-2)')
                ->update([
                    'level' => \DB::raw("`level` - 1")
                ]);
        }
    }

    //获取分币位置
    public static function award($cur_pos = 1, $max_level = 7)
    {
        $position = [];
        if ($cur_pos < pow(2, $max_level - 2)) {
            $p = $cur_pos * 2;
            for ($i = 1; $i < $max_level - 1; $i++) {
                if ($p > pow(2, $max_level - $i - 1))
                    $p = pow(2, $max_level - $i - 1);
                else
                    break;
            }
            return [
                'level' => $max_level - $i,
                'position' => [$p, $p - 1],
                'x' => 0.5
            ];
        } else {
            return [
                'level' => 1,
                'position' => [1],
                'x' => 1
            ];
        }

    }

    //获取当前级别人数
    public static function position_count($group = 0, $level = 1)
    {
        return self::where([['group', $group], ['level', $level], ['position', '<>', 0]])->count();
    }
}
