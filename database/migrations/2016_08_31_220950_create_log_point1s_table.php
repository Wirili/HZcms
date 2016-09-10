<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogPoint1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_point1s', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户id');
            $table->decimal('price',10,2)->default(0)->comment('金额');
            $table->string('about',255)->default('')->comment('日志详情');
            $table->string('ip',50)->default('')->comment('IP');
            $table->string('type',100)->default('')->comment('log类型');
            $table->dateTime('add_time')->nullable()->comment('添加时间');
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
        Schema::drop('log_point1s');
    }
}
