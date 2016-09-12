<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoint2SellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point2_sells', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0);
            $table->integer('money')->default(0)->comment('挂单金额');
            $table->string('state',50)->default('挂单中')->comment('状态');
            $table->string('alipay_name',100)->default('')->comment('支付宝账号');
            $table->string('alipay_fullname',100)->default('')->comment('支付宝名称');
            $table->string('weixin',100)->default('')->comment('微信');
            $table->string('mobile',100)->default('')->comment('手机');
            $table->unsignedInteger('buy_user_id')->default(0);
            $table->dateTime('buy_time')->nullable();
            $table->boolean('is_pay')->default(0);
            $table->dateTime('pay_time')->nullable();
            $table->boolean('is_delete')->default(0);
            $table->dateTime('delete_time')->nullable();
            $table->dateTime('confirm_time')->nullable();
            $table->dateTime('add_time')->nullable();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point2_sells');
    }
}
