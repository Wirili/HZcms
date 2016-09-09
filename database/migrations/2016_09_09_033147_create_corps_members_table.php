<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorpsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corps_members', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0)->comment('用户id');
            $table->string('member_no',50)->default('')->comment('成员编号');
            $table->tinyInteger('level')->default(0)->comment('等级');
            $table->unsignedInteger('group')->default(0)->comment('军团编号');
            $table->unsignedSmallInteger('position')->default(0)->comment('位置');
            $table->dateTime('add_time')->comment('添加时间');

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
        Schema::dropIfExists('corps_members');
    }
}
