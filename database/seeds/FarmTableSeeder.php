<?php

use Illuminate\Database\Seeder;
use App\Models\Farm;

class FarmTableSeeder extends Seeder
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
            'title'=>'蓝冰',
            'image'=>'\data\farm\1_2016082908062957194.gif',
            'point2_day'=>9,
            'life'=>7,
            'money'=>55,
            'min_level'=>0,
            'buy_limit'=>10,
            'max_limit'=>80
        ]];
        foreach ($lists as $list) {
            Farm::create($list);
        }
    }
}
