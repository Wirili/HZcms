<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name')->comment('用户名');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('mobile')->nullable()->comment('手机');
            $table->string('password')->comment('密码');
            $table->timestamp('last_login')->comment('最后登陆时间');
            $table->string('last_ip',15)->default('')->comment('登陆IP');
            $table->unsignedInteger('suppliers_id')->default(0)->comment('供应商id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
