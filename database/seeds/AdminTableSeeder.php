<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
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
            'name'=>'admin',
            'email'=>'admin@qq.com',
            'password'=>\Hash::make('admin')
        ]];
        foreach ($lists as $list) {
            Admin::create($list);
        }
    }
}
