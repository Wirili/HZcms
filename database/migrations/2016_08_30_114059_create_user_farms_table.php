<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_farms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->unsignedInteger('farm_id')->default(0)->comment('宠物ID');
            $table->string('title',100)->default('')->comment('宠物名称');
            $table->string('image',255)->default('')->comment('宠物图片');
            $table->unsignedInteger('num')->default(0)->comment('数量');
            $table->decimal('money',10,2)->default(0)->comment('购买单价');
            $table->decimal('point2_day',10,2)->default(0)->comment('每天产币数');
            $table->unsignedInteger('life')->default(0)->comment('生存周期');
            $table->boolean('is_end')->default(0)->comment('是否死亡');
            $table->unsignedInteger('settle_len')->default(0)->comment('结算次数');
            $table->dateTime('settle_time')->nullable()->comment('最后结算时间');
            $table->dateTime('add_time')->nullable()->comment('添加时间');
            $table->dateTime('end_time')->nullable()->comment('死亡时间');
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
        Schema::drop('user_farms');
    }
}
