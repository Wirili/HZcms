<?php

use Illuminate\Database\Seeder;
use App\Models\UserFarm;

class UserFarmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $lists=[[
            'user_id'=>7,
            'farm_id'=>1,
            'title'=>'蓝冰',
            'image'=>'\data\farm\1_2016082908062957194.gif',
            'num'=>1,
            'point2_day'=>9,
            'life'=>7,
            'money'=>55,
            'add_time'=>date('Y-m-d',strtotime('-1 day')),
            'end_time'=>date('Y-m-d',strtotime('+6 day'))
        ]];
        foreach ($lists as $list) {
            UserFarm::create($list);
        }
    }
}
