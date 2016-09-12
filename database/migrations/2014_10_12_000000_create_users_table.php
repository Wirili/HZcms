<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name')->comment('用户名');
            $table->string('fullname',100)->default('')->comment('姓名');
            $table->string('img',255)->default('')->comment('头像');
            $table->string('email')->default('')->comment('邮箱');
            $table->string('mobile')->default('')->comment('手机');
            $table->string('password')->default('')->comment('密码');
            $table->string('password2')->default('')->comment('安全密码');
            $table->unsignedInteger('parent_id')->default(0)->comment('推荐人ID');
            $table->integer('level')->default(1)->comment('等级');
            $table->unsignedTinyInteger('sex')->default(0)->comment('性别');
            $table->string('alipay_name',100)->default('')->comment('支付宝');
            $table->string('alipay_fullname',100)->default('')->comment('支付宝姓名');
            $table->string('addr_address',100)->default('')->comment('收货人地址');
            $table->string('addr_postcode',100)->default('')->comment('收货人邮编');
            $table->string('addr_name',100)->default('')->comment('收货人');
            $table->string('addr_tel',100)->default('')->comment('收货人电话');
            $table->string('weixin',100)->default('')->comment('微信');
            $table->decimal('point1',10,2)->default(0)->comment('激活币');
            $table->decimal('point2',10,2)->default(0)->comment('金币');
            $table->dateTime('reg_time')->nullable()->comment('注册时间');
            $table->string('reg_ip',50)->default('')->comment('注册IP');
            $table->dateTime('last_time')->nullable()->comment('登录时间');
            $table->string('last_ip',50)->default('')->comment('登陆IP');
            $table->dateTime('pass_time')->nullable()->comment('激活时间');
            $table->boolean('is_pass')->default(0)->comment('是否激活');
            $table->dateTime('lock_time')->nullable()->comment('锁定时间');
            $table->boolean('is_lock')->default(0)->comment('是否锁定');
            $table->dateTime('settle_time')->nullable()->comment('结算时间');
            $table->unsignedInteger('login_count')->default(0)->comment('登陆次数');
            $table->rememberToken();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
