<?php

use Illuminate\Database\Seeder;
use App\Models\CorpsMember;

class CorpsMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level=1;
        $count=1;
        for($i=1;$i<=7;$i++){
            $lists[]=[
                'user_id'=>1,
                'member_no'=>$i,
                'level'=>$level,
                'group'=>1,
                'position'=>$i,
                'add_time'=>date('Y-m-d H:i:s'),
            ];
            if($count==pow(2,$level-1)) {
                $level++;
                $count = 1;
            }else
                $count++;
        }
        foreach ($lists as $list) {
            CorpsMember::create($list);
        }
    }
}
