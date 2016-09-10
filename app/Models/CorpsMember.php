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
    public static function award($cur_pos=1,$max_level=7)
    {
        $p=$cur_pos*2;
        for($i=1;true;$i++){
            if($p>pow(2,$max_level-$i-1))
                $p=pow(2,$max_level-$i-1);
            else
                break;
        }
        return [
            'level'=>$max_level-$i,
            'position'=>$p
        ];
    }
}
