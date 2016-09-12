<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100)->comment('宠物名称');
            $table->string('image',255)->nullable()->comment('宠物图片');
            $table->decimal('point2_day',10,2)->default(0)->comment('每天产币数');
            $table->unsignedInteger('life')->default(0)->comment('生存周期');
            $table->decimal('money',10,2)->default(0)->comment('购买单价');
            $table->unsignedInteger('min_level')->default(1)->comment('限购等级');
            $table->unsignedInteger('buy_limit')->default(0)->comment('限购数量');
            $table->unsignedInteger('max_limit')->default(0)->comment('乐园最多存在数量');
            $table->unsignedInteger('sort_order')->default(100)->comment('排序');
            $table->dateTime('add_time')->nullable()->comment('添加时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('farms');
    }
}
