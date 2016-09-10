<?php
return [
    'edit'=>'编辑基本配置',

    'tab_info'=>'通用信息',
    'tab_basic'=>'基本信息',
    'tab_recommend'=>'推荐会员配置',
    'tab_level'=>'会员升级配置',
    'tab_withdraw'=>'提现配置',
    'tab_corps'=>'军团配置',

    'web_title' => '网站名称',
    'web_desc' => '网站描述',
    'web_keys' => '网站关键词',
    'web_close' => '关闭网站',
    'web_qq' => '客服QQ',
    'point2rem' => [
        1 => '第一代',
        2 => '第二代',
        3 => '第三代',
        4 => '第四代',
        5 => '第五代'
    ],
    'user_reg' => '会员注册',
    'user_act' => '会员激活',
    'user_act_point1' => '激活会员',
    'user_act_point2' => '被激活会员',
    'level' =>[
        1 => 'VIP',
        2 => 'VIP2',
        3 => 'VIP3',
        4 => 'VIP4',
        5 => 'VIP5'
    ],
    'withdraw_fee' => '手续费',
    'withdraw_member' => '需求直荐',
    'withdraw_minmoney' => '最低提现',
    'corps_max_level' => '最大级数',
    'corps_money' => '参加金额',
    'corps_level_name' => '级别名称',
    'range'=>[
        'web_close'=>[
            0=>'关闭',
            1=>'打开',
        ],
    ],
    'desc'=>[
        'web_qq'=>'多个QQ请使用英文单引号隔开如“123,124”',
        'user_reg'=>'每推荐1个会员注册，获得的金币数（一般推荐关闭，因为会造成大量虚拟会员注册）',
        'user_act'=>'每当推荐的会员被激活，获得的金币数',
        'user_act_point1'=>'所需激活币数',
        'user_act_point2'=>'赠送金币数',
        'level' => [
            1 => '需推荐激活会员数（VIP只能填写0，注册后默认是VIP）',
            2 => '需推荐激活会员数',
            3 => '需推荐激活会员数',
            4 => '需推荐激活会员数',
            5 => '需推荐激活会员数',
        ],
        'withdraw_fee' => '提现金额百分比',
        'withdraw_member' => '需直接推荐激活会员数',
        'withdraw_minmoney' => '最小提现金额数',
    ],
    'pls'=>'请选择',
    'save_success' =>'网站配置保存成功！',
];