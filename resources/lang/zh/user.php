<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2016/5/11
 * Time: 16:01
 */
return [
    'name' => '玩家编号',
    'fullname' => '玩家姓名',
    'parent' => '上级编号',
    'child_count' => '直荐人数',
    'is_pass' => '激活状态',
    'is_pass_option' => [
        0=>'未激活',
        1=>'已激活',
    ],
    'is_lock' => '账号状态',
    'is_lock_option' => [
        0=>'正常',
        1=>'已锁定',
    ],
    'level_label'=>'VIP等级',
    'level'=>[
        0=>'无等级',
        1=>'<span class="label label-default">VIP</span>',
        2=>'<span class="label label-danger">VIP1</span>',
        3=>'<span class="label label-danger">VIP2</span>',
        4=>'<span class="label label-danger">VIP3</span>',
        5=>'<span class="label label-danger">VIP4</span>',
    ],
    'last_time'=>'最后登录时间',
    'reg_time'=>'注册时间',
    'no_data'=>'暂无记录',
    'point2' => '金币余额',
    'point2sum' => '金币收益',
    'point1'=>'激活币',
    'point1_bal'=>'激活币余额',
    'point1_act'=>'所需激活币',
    'act_user_label'=>'激活玩家编号',
    'act_user_btn'=>'激活玩家',
    'referral_link'=>'推广链接',
    'click_copy'=>'点击复制',
    //act_user
    'act_user_success'=>'激活玩家[<strong>:name</strong>]成功！',
    'act_user_validator'=>[
        'act_user.required'=>'请输入要激活的玩家编号！',
        'act_user.not_in'=>'不能激活自己的玩家编号！',
        'act_user.exists'=>'激活的玩家编号不存在或已激活！',
        'user_act_point1.min'=>'激活币不足，请联系客服进行充值！',
    ],
    //get_user
    'get_user_info'=>[
        'exist'=>'玩家姓名：:name，激活状态：:is_pass，注册时间：:reg_time，上级编号：:parent_name',
        'not_exist'=>'您输入的玩家编号不存在',
    ],

    //log_login
    'log_login'=>[
        'ip'=>'登陆IP',
        'add_time'=>'登陆时间',
    ],
];