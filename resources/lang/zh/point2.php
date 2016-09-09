<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2016/5/11
 * Time: 16:01
 */
return [
    'sell_info' => '<strong style="color:red;">警告:</strong><br>
                <span style="color:red;">如果不购买，请勿抢购，否则会扣除您相应的金币作为惩罚！</span><br>
                <strong>注意:</strong><br>
                为了减少服务器资源,只显示前3名挂单的,没显示的后面依次排队挂单<br>
                挂单前请先完善您的支付宝信息!<br>',
    'sell_desc' => '拍卖流程：<br>
                1、<string style="color:red;">卖家</string>挂单拍卖金币（点击“我要挂单”，填写收款支付宝信息和拍卖多少金币）；<br>
                2、<string style="color:blue;">买家</string>抢购金币（点击“我要抢购”）；<br>
                3、<string style="color:blue;">买家</string>打款给卖家（30分钟内未付款 则视为恶意交易，系统将扣除买家的违约金）；<br>
                4、<string style="color:blue;">买家</string>确认已打款（手工付款后，点击“我已付款”）；<br>
                5、<string style="color:red;">卖家</string>确认已收款（点击“确认收款”，金币由系统自动确认给买家。卖家超过12小时不确认收款，公司将没收卖家本次交易金币）。<br>',
    'buy_log_info'=>'<span style="color:red;"><strong>警告:</strong><br>
                <strong>1.请立即向对方支付宝打款,30分钟内未付款 则视为恶意交易,系统会扣除您的违约金 具体为: 主动放弃交易扣除20金币 超过30分钟超时 扣除20金币,没有打款而点确认付款的扣除3倍本次交易总额金币</strong><br>
                2.向对方支付宝账号打款成功后,请把点击后面的\'我已付款\'按钮 确认付款,等待卖家确认,这时候您可以主动通过微信或者电话联系卖家确认收款<br>
                3.如果付款完成,卖家长时间不确认收货,请联系公司出面解决,届时会对卖家做相应惩罚,并给予您补偿</span>',
    'sell_log_info'=>'<span style="color:red;"><strong>警告:</strong><br>
                1.如果买家已把钱币打到你支付宝，而你超过12小时不确认收款，公司将没收你本次交易金币</span>',
    'sell_btn' => '我要挂单',
    'label' => [
        'id'=>'单号',
        'money'=>'挂单金额',
        'sell_pay_info'=>'卖家收款信息',
        'sell_info'=>'卖家联系信息',
        'buy_info'=>'我的购买信息',
        'state'=>'状态',
        'add_time'=>'挂单时间',
        'handle'=>'操作',
    ],
    'sell_pay_info_desc'=>'支付宝帐号：:alipay_name<br>
                           支付宝户名：:alipay_fullname<br>',
    'sell_info_desc'=>'微信：:weixin<br>
                       手机：:mobile<br>',
    'buy_info_desc'=>'购买时间：:add_time<br>
                      :is_pay<br>',
    'is_pay'=>[
        0=>'<span style="color:red;">未付款</span>',
        1=>'<span style="color:green;">已付款</span>'
    ],
];